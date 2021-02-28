<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpertaskTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::connection(env('DB_CONNECTION_MONGO'))
                ->create('opertask_booking_url', function (Blueprint $collection) 
        {
            $collection->index('booking_uri');
            $collection->index('booking_no');
            $collection->index('booking_time');
            $collection->index('vehicle_type_and_brand');
            $collection->index('vehicle_license_plat');
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
            ->table('opertask_booking_url', function (Blueprint $collection) 
        {
            $collection->dropIndex();
        });
    }
}
