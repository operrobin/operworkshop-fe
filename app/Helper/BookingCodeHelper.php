<?php

namespace App\Helper;

use App\Model\OperOrder;

class BookingCodeHelper{

    const BOOKING_CODE_LENGTH_SETTING = 9;

    /**
     * @static
     * generateCode
     * A function that generates Booking Code.
     * 
     * @param integer workshop_id
     * Reference to workshop_bengkels
     * 
     * @param integer seeds (default 8)
     * Booking Code length.
     * 
     * @return string
     * Combination of random string and workshop's name string representatives. 
     */
    public static function generateCode($workshop_id, $seeds = self::BOOKING_CODE_LENGTH_SETTING){
        $booking_code = "";

        $salt = "A0B1C2D3E4F5G6H7I8J9K0LMNOPQRSTUVWXYZ";

        for($i = 0; $i < $seeds; $i++){
            $booking_code.= $salt[rand(0, (strlen($salt) - 1))];
        }

        /**
         * @return \App\Helper\BookingCodeHelper::generateCode
         * 
         * If booking_code is already exists
         */
        $order = OperOrder::where('booking_no', $booking_code)->get()->first();

        if(!empty($order)){
            return self::generateCode($workshop_id);
        }

        return $booking_code;
    }
}