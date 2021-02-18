<?php

namespace App\Messanging;

use PhpAmqpLib\Connection\AMQPStreamConnection;

use Symfony\Component\Console\Output\ConsoleOutput;

abstract class RabbitMQConfig{

    /**
     * @var \PhpAmqpLib\Connection\AMQPStreamConnection $con
     */
    protected $con;

    /**
     * @var 
     */
    protected $channel;
    
    protected function initializeConnection(){
        $this->con = new AMQPStreamConnection(
            env('RABBIT_MQ_SERVER_URI'),
            env('RABBIT_MQ_SERVER_PORT'),
            env('RABBIT_MQ_SERVER_USERNAME'),
            env('RABBIT_MQ_SERVER_PASSWORD')
        );

        $this->channel = $this->con->channel();
    }

    protected function close(){
        $this->channel->close();
        $this->con->close();
    }

    protected function printLog($message){
        $out = new ConsoleOutput();
        $out->writeln($message);
    }
}