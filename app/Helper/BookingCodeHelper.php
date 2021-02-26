<?php

namespace App\Helper;

use App\Model\Workshop;

class BookingCodeHelper{

    const BOOKING_CODE_LENGTH_SETTING = 8;

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

        $workshop_name = Workshop::find($workshop_id)->workshop_name;

        $post_salts = "";
        for($i = 0; $i < strlen($workshop_name); $i++){
            if(strlen($post_salts) == 3){
                break;
            }

            if($i%3 == 0 && $workshop_name[$i] != ' ') $post_salts.= $workshop_name[$i];
        }

        return $booking_code.strtoupper($post_salts);
    }
}