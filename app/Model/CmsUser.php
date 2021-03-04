<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CmsUser extends Model
{
    protected $table = "cms_users";

    protected $append = [
        'image_url'
    ];

    public function getImageUrlAttribute(){
        return env('CMS_URL')."files/cms-user/".$this->url_image;
    }
}
