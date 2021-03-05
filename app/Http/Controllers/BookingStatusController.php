<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\OperOrder;
use App\Model\BookingInfo;
use App\Model\NoSQL\BookingUri;
use App\Model\NoSQL\OpertaskToken;

use App\Services\OperTaskServices;


class BookingStatusController extends Controller
{
    /**
     * @static
     * @var integer
     * 
     * Booking Status Codes
     * An enumeration to be send to statusFallback function
     */
    const BOOKING_DONE = 1;
    const BOOKING_CANCELED = 2;
    const WRONG_BOOKING_CODE = 3;
    const SOMETHING_WRONG = -1;

    /**
     * bookingStatusScreen
     * An API that return customer's status page.
     * 
     * @param string booking_uri
     *  Path variable. Reference to opertask_booking_url collection
     * 
     * @return html
     */
    public function bookingStatusScreen($booking_uri){
        $resultSet = BookingUri
                        ::where('booking_uri', $booking_uri)
                        ->get()
                        ->first();

        /**
         * If Booking Uri is not found, redirect to booking page.
         */
        if(empty($resultSet)){
            return redirect('/booking-status/message?status='.self::WRONG_BOOKING_CODE);
        }

        /**
         * Increase visit_counter
         */
        $resultSet->visit_counter = $resultSet->visit_counter + 1;
        $resultSet->save();

        /**
         * Get Order from hashed booking_uri
         */
        $order = OperOrder
                    ::where('booking_no', $resultSet->booking_no)
                    ->whereNotIn('order_status', [
                        OperOrder::BOOKING_CANCELED,
                        OperOrder::BOOKING_DONE
                    ])
                    ->with([
                        'booking_info',
                        'task',
                        'task.tasks' => function($e){
                            $e->orderBy('list_sequence', 'ASC');
                        },
                        'foreman',
                        'service_advisor',
                        'workshop'
                    ])
                    ->get()
                    ->first();

        if($order == null){
            return redirect('/booking-status/message?status='.self::WRONG_BOOKING_CODE);
        }

        /**
         * Get token
         */
        $token = OpertaskToken::all()->first()->bearer_token;

        /**
         * Get data from OperTask API
         */
        $service = new OperTaskServices();
        $response = $service->getOrderByIdOrder(
            $order->booking_info->oper_task_order_id
            , $token
        );

        return view(
            'independent/customer-services-status',
            [
                "booking_uri" => $resultSet,
                "data" => $order,
                "oper_task" => $response->data
            ]
        );
    }

    /**
     * cancelOrder
     * An Stateful API to cancel order.
     * 
     * @param integer order_id 
     *  Reference to oper_orders
     * 
     * @param string alasan
     * 
     * @return redirect to statusFallback() 
     */
    public function cancelOrder(Request $request){
        $v = validator()->make($request->all(), [
            'order_id' => 'required|exists:oper_orders,id',
            "alasan" => 'required'
        ]);

        if ($v->fails()) {
            return back();
        }

        /**
         * Update booking page.
         */

        $order = OperOrder
                    ::where('id', $request->get('order_id'))
                    ->with('booking_info')
                    ->get()
                    ->first();

        $order->order_status = OperOrder::BOOKING_CANCELED;
        $order->save();

        $service = new OperTaskServices();

        /**
         * Get token
         */
        $token = OpertaskToken::all()->first()->bearer_token;

        $response = $service->cancelOrder(
            $order->booking_info->oper_task_order_id,
            $request->get('alasan'),
            $token
        );

        if($response->status == false){
            return redirect('/booking-status/message?status='.self::SOMETHING_WRONG);
        }else{
            return redirect('/booking-status/message?status='.self::BOOKING_CANCELED);
        }
    }

    /**
     * orderDone
     * An Stateful API to make order done.
     * 
     * @param integer order_id 
     *  Reference to oper_orders
     * 
     * @param string feedback | Not Mandatory
     * 
     * @return redirect to statusFallback() 
     */
    public function orderDone(Request $request){
        $v = validator()->make($request->all(), [
            'order_id' => 'required|exists:oper_orders,id'
        ]);

        if ($v->fails()) {
            return back();
        }

        /**
         * Update booking page.
         */

        $order = OperOrder
                    ::where('id', $request->get('order_id'))
                    ->get()
                    ->first();

        $order->order_status = OperOrder::BOOKING_DONE;
        $order->feedback = $request->get('feedback') ?? "";
        $order->save();

        $service = new OperTaskServices();

        return redirect('/booking-status/message?status='.self::BOOKING_DONE);
    }

    public function statusFallback(Request $request){
        return view('independent/message', [
            "status" => $request->get('status')
        ]);
    }
}
