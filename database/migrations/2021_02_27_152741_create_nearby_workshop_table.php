<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearbyWorkshopTable extends Migration
{
    /**
     * Run the migrations.
     * @see \App\Model\NoSQL\NearbyWorkshop
     * @return void
     */
    public function up()
    {

        Schema::connection(env('DB_CONNECTION_MONGO'))
                ->create('workshop_nearby', function (Blueprint $collection) 
        {
            $collection->index('batch_id');
            $collection->index('user_lat_lng');
            $collection->index('workshop_id');
            $collection->index('distance');
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
            ->table('workshop_nearby', function (Blueprint $collection) 
        {
            $collection->dropIndex();
        });
    }
}
