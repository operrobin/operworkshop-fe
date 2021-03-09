<?php

namespace App\Model\NoSQL;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * NearbyWorkshop
 * A model that represent entity of workshop_nearby in mongodb database. 
 * 
 * @link https://appdividend.com/2018/05/10/laravel-mongodb-crud-tutorial-with-example/
 */
class NearbyWorkshop extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'workshop_nearby';

    protected $fillable = [
        /**
         * @var integer batch_id
         * batch_id is an identifier that later will be stored on Session 
         * for users. 
         */
        'batch_id',

        /**
         * @var string user_lat_lng
         * user_lat_lng is user's coordinate information that will be
         * stored as string in this format below:
         * 
         * {user_lat},{user_lng}
         * 
         * {@example "-6.1234567, 102.3123545"} 
         */
        'user_lat_lng',

        /**
         * @var integer workshop_id
         * Reference to the MySQL table `workshop_bengkels`
         */
        'workshop_id',

        /**
         * @var double distance
         * Reference to distance from user's coordinate to workshop's coordinate
         */
        'distance',

        /**
         * @var \DateTime::class created_at
         * Reference to created data's time.
         */
        'created_at'
    ];

    public function workshop(){
        return $this->hasOne('App\Model\Workshop', 'id', 'workshop_id');
    }
}
