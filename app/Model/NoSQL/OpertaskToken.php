<?php

namespace App\Model\NoSQL;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class OpertaskToken extends Eloquent{
    protected $connection = 'mongodb';
    protected $collection = 'opertask_token';

    protected $fillable = [
        
        /**
         * @var string bearer_token
         * Token that get from opertask's API.
         */
        'bearer_token',

        /**
         * @var \DateTime::class created_at
         * Reference to created data's time.
         */
        'created_at'
    ];
}