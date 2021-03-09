<?php

namespace App\Helper;

use App\Model\PhoneOTP;

use App\Messanging\Producer\SendOTP;

use App\Services\TelegramServices;
use App\Services\FonnteServices;

use Log;

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

    private function createPhoneOTP($phone_number, $type){
        /**
         * Create new otp_verifications
         */
        $otp = new PhoneOTP();
        $otp->phone = $phone_number;
        $otp->otp_code = $this->generateCode(self::OTP_LENGTH_SETTING);
        $otp->otp_type = $type;
        $otp->created_at = new \DateTime('now');
        $otp->save();

        return $otp;
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

        $otp = $this->createPhoneOTP($phone_number, $type);

        /**
         * Message Broker to send OTP to Node JS Server
         */
        try{
            $producer = new SendOTP();
            $producer->produce(
                $otp->id,
                $otp->phone,
                $otp->otp_code
            );
        }catch(\Throwable $e){
            Log::alert("Failed to send OTP trough broker: ".$e->getMessage());

            if(env('OTP_MODE') == "FAKE"){
                $this->fakeOTP($phone_number, $type);
            }else{
                $this->whatsappOTP($phone_number, $type);
            }
        }
    }

    /**
     * whatsappOTP
     */
    public function whatsappOTP($phone_number, $type){

        $otp = $this->createPhoneOTP($phone_number, $type);

        $fonnte = new FonnteServices();

        $fonnte->sendMessage(
            $phone_number,
            "Oper Workshop - JANGAN MEMBERITAHU KODE RAHASIA INI KE SIAPAPUN. KODE RAHASIA UNTUK MASUK: {$otp->otp_code}"
        );

    }

    /**
     * Plan B
     * fakeOTP
     * A function to send OTP trigger to Telegram Services.
     */
    public function fakeOTP($phone_number, $type){
        
        $otp = $this->createPhoneOTP($phone_number, $type);

        $telegram = new TelegramServices();
        $telegram->sendMessage(
            "Your OTP Code for phone number {$otp->phone} is {$otp->otp_code}"
        );
    }

    /**
     * updateOTPSentStatus
     * A function to update phone otp as sent to 1.
     * 
     * @param integer id => Reference to id in otp_verifications
     *  @see \App\Model\PhoneOTP::class
     */
    public function updateOTPSentStatus($id){
        $otp = PhoneOTP::find($id);
        $otp->is_sent = 1;
        $otp->save();
    }
}