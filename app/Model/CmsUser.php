<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CmsUser extends Model
{
    protected $table = "cms_users";

    public $timestamps = false;

    protected $append = [
        'image_url'
    ];

    public function getImageUrlAttribute(){

        /**
         * Manual parsing saved image url
         */
        $text_length = strlen($this->url_image);
        $index = -1;
        $file_name_length = 1;

        for($i = $text_length; $i > 0; $i--){
            if($this->url_image[$i-1] == '/'){
                $index = $i-1;
                break;
            }

            $file_name_length++;
        }

        return env('CMS_URL')."files/cms-user/".substr($this->url_image, $index, $file_name_length);
    }
}
