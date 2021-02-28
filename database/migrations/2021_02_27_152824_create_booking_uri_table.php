<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingUriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::connection(env('DB_CONNECTION_MONGO'))
                ->create('opertask_token', function (Blueprint $collection) 
        {
            $collection->index('bearer_token');
            $collection->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CONNECTION_MONGO'))
            ->table('opertask_token', function (Blueprint $collection) 
        {
            $collection->dropIndex();
        });
    }
}
