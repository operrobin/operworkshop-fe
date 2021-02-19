<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

class FlushSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info('Happy logging out all of your customers!');
        $this->info('Executing rm storage/logs/*.log');

        /**
         * @link https://stackoverflow.com/a/53782441
         */
        exec('rm -f storage/framework/sessions/*');

        $this->info('All customers logged out.');

        return 0;
    }
}
