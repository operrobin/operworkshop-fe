<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTransferObject\BaseResponse;

use App\Model\CustomerOper;
use App\Model\CmsUser;
use App\Model\OperOrder;
use App\Model\MasterBrand;
use App\Model\Workshop;
use App\Model\BookingInfo;
use App\Model\MasterTask;
use App\Model\WorkshopSetting;
use App\Model\NoSQL\NearbyWorkshop;
use App\Model\NoSQL\OpertaskToken;
use App\Model\NoSQL\BookingUri;

use App\Services\OperTaskServices;

use App\Helper\BookingCodeHelper;
use App\Helper\MessageHelper;

use Log;

use DB;


class BookingController extends Controller
{
    /**
     * makeOrder
     * An API to create Booking datas.
     * This API also create new Customer if their respectives 
     * customer_phone's input is not found in our records.
     * 
     * @param string customer_name
     * @param string customer_phone
     * @param string customer_email
     * @param string customer_address
     * 
     * @param string booking_date
     *      This string must had date PHP readable format.
     *      d-m-Y or Y-m-d are acceptable
     * 
     * @param string booking_time
     *      This string must had time PHP readable format.
     *      H:i
     * 
     * @param string vehicle_name
     * @param integer vehicle_brand_id
     *      Reference to \App\Model\MasterBrand
     * 
     * @param string vehicle_license_plat
     * 
     * @param integer bengkel_type
     *      Reference to constants in \App\Model\Workshop
     * 
     * @param double customer_lat
     * @param double customer_lng
     * 
     * @param integer workshop_id
     *      Reference to \App\Model\Workshop
     * 
     * @return mixed
     *      If there's something wrong with the input will be return object 
     *      If the whole process is succesful or failed in the middle will be return link string.
     */
    public function makeOrder(Request $request){
        $v = validator()->make($request->all(), [
            "customer_name"     => "required",
            "customer_phone"    => "required",
            "customer_email"    => "required",
            "customer_address"  => "required",
            "booking_date"      => "required",
            "booking_time"      => "required",
            "vehicle_type"      => "required",
            "vehicle_name"      => "required",
            "vehicle_brand_id"  => "required|exists:master_brands,id",
            "vehicle_license_plat" => "required",
            "bengkel_type"      => "required",
            "customer_lat"      => "required",
            "customer_lng"      => "required",
            "workshop_id"       => "required|exists:workshop_bengkels,id",
        ]);


        if ($v->fails()) {
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $formatted_phone = "0".$request->get('customer_phone');

        /**
         * Create customer if not exist.
         */
        $customer = CustomerOper
                        ::where('customer_hp', $formatted_phone)
                        ->get()
                        ->first();

        if(empty($customer)){
            $customer = new CustomerOper();
            $customer->customer_name = $request->get('customer_name');
            $customer->customer_hp = $formatted_phone;
            $customer->customer_email = $request->get('customer_email');
            $customer->joined_date = new \DateTime('now');
            $customer->save();
        }

        /**
         * Start Mas Robin's algorithm
         */

        /**
         * Hit to OperTask API
         */

        $token = OpertaskToken::all()->first()->bearer_token;
        $booking_code = BookingCodeHelper::generateCode($request->get('workshop_id'));
        $booking_time = date("Y-m-d {$request->get('booking_time')}:00", strtotime($request->get('booking_date')));

        /**
         * Generate message and initialization
         */
        $vehicle_brand = MasterBrand::find($request->get('vehicle_brand_id'));

        $workshop = Workshop::find($request->get('workshop_id'));
        
        $vehicle_type_and_brand = $vehicle_brand->brand_name." ".$request->get('vehicle_name');
        
        $message = 
            "Kode Booking : {$booking_code} \n\n"
            ."Nama Konsumen : {$customer->customer_name}\n\n"
            ."Telfon Konsumen : {$customer->customer_hp}\n\n"
            ."Tipe Kendaraan : {$vehicle_brand->brand_name} {$request->get('vehicle_name')}\n\n"
            ."Waktu Booking : {$booking_time}\n\n"
            ."Harap sebutkan kode booking ketika hendak menghubungi konsumen melalui Whatsapp."
        ;

        $service = new OperTaskServices();

        $response = $service->sendOrder(
                    [
                        "task_template_id" => "1",
                        "booking_time" => $booking_time,
                        "origin_latitude" => strval($request->get('customer_lat')),
                        "origin_longitude" => strval($request->get('customer_lng')),
                        "destination_latitude" => $workshop->bengkel_lat,
                        "destination_longitude" => $workshop->bengkel_long,
                        "user_fullname" => $customer->customer_name,
                        "user_phonenumber" => $customer->customer_hp ?? $formatted_phone,
                        "vehicle_owner" => $customer->customer_name,
                        "vehicle_brand_id" => $request->get('vehicle_brand_id'),
                        "vehicle_type" => $request->get('vehicle_name'),
                        "vehicle_transmission" => "CVT",
                        "client_vehicle_license" => $request->get('vehicle_license_plat'),
                        "message" => $message
                    ],
                    $token
        );

        $response_payload_code = null;
        $response_payload_message = null;
        $response_payload_data = null;

        if($response->message === "success"){

            /**
             * Get Task Data
             */

            $workshop = Workshop::find($request->get('workshop_id'));

            /**
             * Create new Order
             * 
             */
            $order = new OperOrder();
            $order->master_task = $workshop->task_id;
            $order->bengkel_id = $request->get('workshop_id');
            $order->vehicle_name = $request->get('vehicle_name');
            $order->vehicle_brand = $request->get('vehicle_brand_id');
            $order->vehicle_plat = $request->get('vehicle_license_plat');
            $order->customer_name = $request->get('customer_name');
            $order->customer_hp = $formatted_phone;
            $order->customer_email = $request->get('customer_email');
            $order->customer_address = $request->get('customer_address');
            $order->customer_long = $request->get('customer_lng');
            $order->customer_lat = $request->get('customer_lat');
            $order->order_type = $request->get('vehicle_type');
            $order->order_status = OperOrder::WAITING_FOR_DRIVER;
            $order->booking_no = $booking_code;
            $order->booking_time = $booking_time;
            $order->save();


            /**
             * Insert booking info
             */
            $info = new BookingInfo();
            $info->booking_no = $order->booking_no;
            $info->oper_task_order_id = $response->data->idorder;
            $info->oper_task_trx_id = $response->data->trx_id;
            $info->order_state = BookingInfo::PICKUP_STATE_ORDER;
            $info->save();
            

            /**
             * Generate message and link for customer
             */
            $booking_uri = new BookingUri();
            $booking_uri->booking_uri = md5($order->id.json_encode(time()));
            $booking_uri->booking_no = $order->booking_no;
            $booking_uri->booking_time = $order->booking_time;
            $booking_uri->vehicle_type_and_brand = $vehicle_type_and_brand; // @see line 76
            $booking_uri->vehicle_license_plat = $order->vehicle_plat;
            $booking_uri->visit_counter = 0;
            $booking_uri->created_at = new \DateTime('now');
            $booking_uri->save(); 

            $messanging = new MessageHelper();

            /**
             * Send Mail to Customer
             */
            
            try{
                $messanging->sendMessage(
                    MessageHelper::EMAIL,
                    $order->customer_email,
                    'mail/email',
                    [
                        "fullname" => $order->customer_name,
                        "booking_no" => $order->booking_no,
                        "booking_time" => date('D M j G:i Y', strtotime($order->booking_time)),
                        "vehicle_brand_and_type" => $vehicle_type_and_brand,
                        "vehicle_license_plat" => $order->vehicle_plat,
                        "booking_uri" => env('APP_URL')."/booking-status/status/".$booking_uri->booking_uri
                    ],
                    "Konfirmasi booking service"
                );
    
                /**
                 * Send Whatsapp
                 */
                $messanging->sendMessage(
                    MessageHelper::WHATSAPP,
                    $order->customer_hp,
                    (
                        "Halo, {$order->customer_name}. Booking anda telah berhasil tercatat disistem kami.\n"
                        ."Kode booking anda adalah {$order->booking_no} pada hari ".date('D M j G:i Y', strtotime($order->booking_time))."\n"
                        ." untuk kendaraan {$vehicle_type_and_brand} dengan nomor plat {$order->vehicle_plat}. \n"
                        ."Silahkan klik tautan berikut untuk melihat keseluruhan proses dari servis anda "
                        .env('APP_URL')."/booking-status/status/".$booking_uri->booking_uri
                    )
                );

                /**
                 * Send Mail to Service Advisor
                 */

                $cms = CmsUser
                        ::where('bengkel_id', $order->bengkel_id)
                        ->get()
                        ->first();

                $messanging->sendMessage(
                    MessageHelper::EMAIL,
                    $cms->email,
                    'mail/email-sa',
                    [
                        "fullname" => $order->customer_name,
                        "booking_no" => $order->booking_no,
                        "booking_time" => date('D M j G:i Y', strtotime($order->booking_time)),
                        "vehicle_brand_and_type" => $vehicle_type_and_brand,
                        "vehicle_license_plat" => $order->vehicle_plat,
                    ],
                    "Notifikasi Customer Baru"
                );

                $messanging->sendMessage(
                    MessageHelper::WHATSAPP,
                    $cms->phone,
                    (
                        "Halo, {$cms->username}. Bila anda mendapatkan pesan ini, berarti ada customer baru dibengkel anda.\n"
                        ."Nama Customer: {$order->customer_name}\n"
                        ."Kode Booking: {$order->booking_no}\n"
                        ."Waktu Booking: {$order->booking_time}\n"
                        ."Merk dan Tipe: {$vehicle_type_and_brand}\n"
                        ."Nomor Plat Kendaraan: {$order->vehicle_plat}\n"
                    )
                );

                $response_payload_code = 200;
                $response_payload_message = "Confirmation success";
                $response_payload_data = env('APP_URL')."/booking-status/confirmation";

            }catch(\Throwable $e){
                Log::debug('Konfirmasi Gagal '.$e);
                $response_payload_code = 500;
                $response_payload_message = "Confirmation failed";
                $response_payload_data = env('APP_URL')."/booking-status/confirmation";
            }
        }else{
            $response_payload_code = 500;
            $response_payload_message = "Confirmation failed";
            $response_payload_data = env('APP_URL')."/booking-status/confirmation-failed";
        }

        return BaseResponse::custom(
            $response_payload_code, 
            $response_payload_message,
            $response_payload_data
        );
    }

    /**
     * checkCurrentBooking
     * Check whatever user had inprogress booking or not.
     * 
     * @param string phone_number
     */
    public function checkCurrentBooking(Request $request){
        $v = validator()->make($request->all(), [
            'phone' => 'required'
        ]);

        if ($v->fails()) {
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $resultSet = OperOrder
                        ::where('customer_hp', "0".$request->get('phone'))
                        ->where('order_status', '!=', OperOrder::GET_DRIVER_AND_SHOW_DRIVER)
                        ->orderBy('id', 'desc')
                        ->get()
                        ->first();

        return BaseResponse::custom(
            $resultSet == null ? 404 : 200, 
            $resultSet == null ? "There are no currently inprogress booking" : "There's a booking with booking code: {$resultSet->booking_no}", 
            $resultSet
        );
    }

}
