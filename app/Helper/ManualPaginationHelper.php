<?php

namespace App\Helper;

use Request;

/**
 * This is a Factory for standard manual pagination
 */
class ManualPaginationHelper{
    /**
     * @var int
     */
    public $current_page = 1;

    /**
     * @var int
     */
    public $from = 0;

    /**
     * @var int
     */
    public $to = 0;

    /**
     * @var int
     */
    public $per_page = 12;

    /**
     * @var int
     */
    public $total = 0;

    /**
     * @var string
     */
    public $path = "";

    /**
     * @var string
     */
    public $first_page_url = "";

    /**
     * @var string
     */
    public $last_page_url = "";

    /**
     * @var string
     */
    public $next_page_url = "";

    /**
     * @var string
     */
    public $prev_page_url = "";

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var string
     */
    const PAGE_PARAM = "?page=";

    public function __construct($data = [], $page = 1,$per_page = 12){
        $this->data = $this->extractResult($data, $page, $per_page);
        $this->total = count($data);
        $this->per_page = $per_page;
        $this->current_page = (int) $page;
        $this->from = ($this->per_page * ($this->current_page-1)) + 1;
        $this->to = ($this->per_page * ($this->current_page-1)) + ($this->per_page);

        $this->path = Request::url();
        $this->prev_page_url = 
        $this->current_page - 1 == 0 ?
        null :
        $this->path.self::PAGE_PARAM.($this->current_page - 1);

        $this->next_page_url = 
        (($this->current_page + 1) * $this->per_page) >= $this->total ?
            null :
            $this->path.self::PAGE_PARAM.($this->current_page + 1);

        $this->first_page_url = 
        $this->path.self::PAGE_PARAM."1";

        $this->last_page_url = 
        $this->path.self::PAGE_PARAM.
        ((int) ($this->total / $this->per_page) + 1);

        return $this;
    }

    public function extractResult($set, $page, $per_page = 12){
        $resultSet = [];

        $page = (int) $page;
        $per_page = (int) $per_page;


        if(!is_array($set)){
            $new_array = [];

            foreach($set as $data){
                array_push($new_array, $data);
            }

            $set = $new_array;
        }

        for($i = (($page-1)*$per_page); $i<= (($page-1)*$per_page + ($per_page-1)); $i++){
            try{
                array_push($resultSet, $set[$i]);
            }catch(\Throwable $e){
                break;
            }
        }

        return $set;
    }
}