<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class Support extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup your database into sql file.';

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
        shell_exec("mysqldump --databases --user=".env('DB_USERNAME')." --password ".env('DB_DATABASE')." > datas.sql");
        Artisan::call('db:wipe');
        return 0;
    }
}
