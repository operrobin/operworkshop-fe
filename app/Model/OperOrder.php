<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OperOrder extends Model
{
    /**
     * @var integer
     * '
     * Reference to `order_status`
     * 
     * Flow: 0 - 1 - 2 - 3 - 9 - 4 - 10 - 5 - 6 - 7 - 8
     * Out of flow: -1
     */
    const WAITING_FOR_DRIVER = 0;
    const GET_DRIVER = 1;
    const SERVICE_ADVISOR_OPEN_ORDER = 2;
    const SERVICE_ADVISOR_SUBMIT_PKB = 3;
    const PKB_CONFIRMED = 9;
    const FOREMAN_TASK = 4;
    const FOREMAN_TASK_DONE = 10;
    const SERVICE_ADVISOR_UPLOAD_INVOICE = 5;
    const WAITING_FOR_DRIVER_AFTER_INVOICE = 6;
    const GET_DRIVER_AND_SHOW_DRIVER = 7;
    const BOOKING_DONE = 8;
    const BOOKING_CANCELED = -1;

    protected $table = "oper_orders";

    protected $appends = [
        'pkb_file_uri'
    ];

    public $timestamps = false;


    public function rating(){
        return $this->hasOne('App\Model\Rating', 'order_id', 'id');
    }

    public function vehicle(){
        return $this->hasOne('App\Model\VehicleName', 'id', 'vehicle_type');
    }

    public function workshop(){
        return $this->hasOne('App\Model\Workshop', 'id', 'bengkel_id');
    }

    public function booking_info(){
        return $this->hasOne('App\Model\BookingInfo', 'booking_no', 'booking_no');
    }

    public function master_task(){
        return $this->hasOne('App\Model\MasterTask', 'id', 'master_task');
    }

    public function tasks() {
        return $this->hasMany('App\Model\ForemanTaskProgress', 'order_id', 'id');
    }

    public function foreman(){
        return $this->hasOne('App\Model\CmsUser', 'id', 'foreman_id');
    }

    public function service_advisor(){
        return $this->hasOne('App\Model\CmsUser', 'id', 'service_advisor_id');
    }

    public function getPkbFileUriAttribute(){
        /**
         * Manual parsing saved image url
         */
        $text_length = strlen($this->pkb_file);
        $index = -1;
        $file_name_length = 1;

        for($i = $text_length; $i > 0; $i--){
            if($this->pkb_file[$i-1] == '/'){
                $index = $i-1;
                break;
            }

            $file_name_length++;
        }

        return env('CMS_URL')."files/pkb/".substr($this->pkb_file, $index, $file_name_length);
    }
}
