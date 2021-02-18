<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class Workshop extends Model
{
    /**
     * @static
     * 
     * @var integer
     * 
     * Reference to bengkel_tipe
     */
    const RESMI = 1;
    const UMUM = 2;

    /**
     * @static
     * 
     * @var integer
     * 
     * Reference to bengkel_status
     */
    const ACTIVE = 0;
    const INACTIVE = 1;

    /**
     * @static
     * 
     * @var integer
     * 
     * Reference to vehicle_type
     */
    const BENGKEL_MOBIL = 1;
    const BENGKEL_MOTOR = 2;
    const BENGKEL_SEMUA = 3;

    protected $table = "workshop_bengkels";

    protected $appends = [
        'workshop_ratings'
    ];

    protected $fillable = [
        'bengkel_name'
    ];

    public function getWorkshopRatingsAttribute(){
        $average = DB::select(DB::Raw("
            SELECT AVG(B.rating) AS rating
            FROM `oper_orders` A
            LEFT JOIN `rating_system` B
                ON B.order_id = A.id
            WHERE A.bengkel_id = {$this->id}
        "));

        return number_format((float) $average[0]->rating ?? 0, 1, '.', '');
    }
}
