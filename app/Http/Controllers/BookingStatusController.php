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
    const BOOKING_CANCELED_BY_PURPOSE = 4;

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

        // dd(
        //     $order
        //     , $response->data
        // );

        // dd($order->task->tasks[0]->list_name);

        return view(
            'independent/customer-services-status',
            [
                "booking_uri" => $resultSet,
                "data" => $order,
                "oper_task" => $response->data
            ]
        );
    }

    public function statusFallback(Request $request){
        return view('independent/message', [
            "status" => $request->get('status')
        ]);
    }
}
