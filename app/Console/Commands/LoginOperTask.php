<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Model\NoSQL\OpertaskToken;

use App\Services\OperTaskServices;

class LoginOperTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opertask:login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get new token from OperTask API.';

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
        /**
         * Delete current existing token since it's no longer used anymore
         */

        OpertaskToken::truncate();

        /**
         * Get new Token
         */

        $service = new OperTaskServices();

        $response = $service->login();

        $token = new OpertaskToken();

        $token->bearer_token = $response->data->access_token;
        $token->created_at = new \DateTime('now');
        $token->save();

        $this->info('Success getting access token from OperTask\'s system.');

        return 0;
    }
}
