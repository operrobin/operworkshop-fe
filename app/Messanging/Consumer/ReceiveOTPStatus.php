<?php

namespace App\Messanging\Consumer;

use App\Messanging\RabbitMQConfig;

use App\Helper\OTPHelper;


class ReceiveOTPStatus extends RabbitMQConfig{
    
    /**
     * @static
     * @var string
     */
    const SEND_CONFIRMATION_CONSUMER_TOPIC = "BE_OTP_CONFIRMATION_TOPIC";

    private $otp_helper;

    public function __construct(){
        $this->initializeConnection();
        $this->otp_helper = new OTPHelper();
    }

    public function consume(){

        /**
         * @link https://github.com/rabbitmq/rabbitmq-tutorials/blob/master/php/receive.php
         */
        $this->channel->queue_declare(self::SEND_CONFIRMATION_CONSUMER_TOPIC, false, true, false, false);

        $callback = function($message){
            $this->printLog("Received message ".json_encode($message->body));
            $data = json_decode($message->body);
            $this->printLog(json_encode($data));
            $this->otp_helper->updateOTPSentStatus($data->otp_id);
            $message->ack();
        };

        $this->channel->basic_qos(null, 1, null);
        $this->channel->basic_consume(self::SEND_CONFIRMATION_CONSUMER_TOPIC, '', false, false, false, false, $callback);

        while($this->channel->is_consuming()){
            $this->channel->wait();
        }

        $this->close();
    }
}