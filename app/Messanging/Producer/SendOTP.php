<?php

namespace App\Messanging\Producer;

use PhpAmqpLib\Message\AMQPMessage;

use App\Messanging\RabbitMQConfig;

class SendOTP extends RabbitMQConfig{
    
    /**
     * @static
     * @var string
     */
    const SEND_OTP_PRODUCER = "BE_OTP_SEND";

    public function __construct(){
        $this->initializeConnection();
    }

    /**
     * produce
     * A producer to send OTP to RabbitMQ Server.
     */
    public function produce($customer_id, $phone, $otp_code){

        /**
         * @link https://www.rabbitmq.com/tutorials/tutorial-two-php.html
         */
        $this->channel->queue_declare(self::SEND_OTP_PRODUCER, false, true, false, false);

        $message = new AMPQMessage(
            (object) [
                "customer_id" => $customer_id, 
                "phone" => $phone,
                "otp_code" => $otp_code
            ],
            [
                "delivery_mode" => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]
        );

        $this->channel->basic_publish(
            $message,
            '',
            self::SEND_OTP_PRODUCER
        );

        $this->close();
    }
}