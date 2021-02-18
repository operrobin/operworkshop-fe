<?php

namespace App\Messanging\Producer;

use PhpAmqpLib\Message\AMQPMessage;

use App\Messanging\RabbitMQConfig;

class SendOTP extends RabbitMQConfig{
    
    /**
     * @static
     * @var string
     */
    const SEND_OTP_PRODUCER_TOPIC = "BE_OTP_SEND_TOPIC";

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
        $this->channel->queue_declare(self::SEND_OTP_PRODUCER_TOPIC, false, true, false, false);

        $message = new AMQPMessage(
            json_encode([
                "customer_id" => $customer_id, 
                "phone" => $phone,
                "otp_code" => $otp_code
            ]),
            [
                "delivery_mode" => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]
        );

        $this->channel->basic_publish(
            $message,
            '',
            self::SEND_OTP_PRODUCER_TOPIC
        );

        $this->close();
    }
}