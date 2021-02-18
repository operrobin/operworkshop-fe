<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Messanging\Consumer\ReceiveOTPStatus;

class ReceiveSentOTP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'otp:receive-sent-otp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command used for receiving sent OTP from Node JS server.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $consumer = new ReceiveOTPStatus();
        $consumer->consume();
        return 0;
    }
}
