<?php

namespace App\Helper;

use App\Model\PhoneOTP;

class OTPHelper{

    /**
     * @static
     * @var integer OTP_LENGTH_SETTING
     */
    const OTP_LENGTH_SETTING = 4;

    /**
     * generateCode
     * A function that generates OTP Number.
     * 
     * @param integer seeds
     *  This parameter is used as OTP's String length.
     *  default @see \App\Helper\OTPHelper::OTP_LENGTH_SETTING
     * 
     * @return string otp_code
     */
    private function generateCode($seeds = self::OTP_LENGTH_SETTING){
        $otp_code = "";

        for($i = 0; $i< $seeds; $i++){
            $otp_code.= rand(0, 9);
        }

        return $otp_code;
    }

    /**
     * triggerOTP
     * A function to send OTP trigger to our Node JS server.
     * 
     * @param string phone_number
     *  This parameter is used as phone number's destination where we send the OTP.
     * 
     * @param string type
     *  This parameter is used as a flag whatever the phone is already registered or not.
     * 
     * @return void
     */
    public function triggerOTP($phone_number, $type){
        /**
         * Create new otp_verifications
         */
        $otp = new PhoneOTP();
        $otp->phone = $phone_number;
        $otp->otp_code = $this->generateCode(self::OTP_LENGTH_SETTING);
        $otp->otp_type = $type;
        $otp->created_at = new \DateTime('now');
        $otp->save();

        /**
         * Message Broker to send OTP to Node JS Server
         */

        /**
         * 
         */
    }
}