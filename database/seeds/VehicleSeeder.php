<?php

use Illuminate\Database\Seeder;

use App\Model\VehicleName;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleName
            ::insert([
                [
                    "vehicle_name" => "Avanza",
                    "master_brand_id" => 1
                ],
                [
                    "vehicle_name" => "Innova",
                    "master_brand_id" => 1
                ],
                [
                    "vehicle_name" => "Kijang",
                    "master_brand_id" => 1
                ],
                [
                    "vehicle_name" => "Fortuner",
                    "master_brand_id" => 1
                ],
                [
                    "vehicle_name" => "Jazz",
                    "master_brand_id" => 2
                ],
                [
                    "vehicle_name" => "CRV",
                    "master_brand_id" => 2
                ],
                [
                    "vehicle_name" => "HRV",
                    "master_brand_id" => 2
                ],
                [
                    "vehicle_name" => "Civic",
                    "master_brand_id" => 2
                ],
                [
                    "vehicle_name" => "Pro Max",
                    "master_brand_id" => 3
                ],
                [
                    "vehicle_name" => "Au Ah 3000",
                    "master_brand_id" => 3
                ],
                [
                    "vehicle_name" => "Mio",
                    "master_brand_id" => 4
                ],
                [
                    "vehicle_name" => "Piano. Iya. Piano",
                    "master_brand_id" => 4
                ],
                [
                    "vehicle_name" => "Pianika",
                    "master_brand_id" => 4
                ],
                [
                    "vehicle_name" => "Satria",
                    "master_brand_id" => 4
                ],
                [
                    "vehicle_name" => "Tesla",
                    "master_brand_id" => 5
                ],
                [
                    "vehicle_name" => "Xpander",
                    "master_brand_id" => 6
                ],
                [
                    "vehicle_name" => "Pajero",
                    "master_brand_id" => 6
                ],
                [
                    "vehicle_name" => "Pajero Sport",
                    "master_brand_id" => 6
                ],
                [
                    "vehicle_name" => "Triton",
                    "master_brand_id" => 6
                ],
                [
                    "vehicle_name" => "Eclipse Cross",
                    "master_brand_id" => 6
                ],
                [
                    "vehicle_name" => "Outlander Phev",
                    "master_brand_id" => 6
                ],
                [
                    "vehicle_name" => "Swift",
                    "master_brand_id" => 7
                ],
                [
                    "vehicle_name" => "Kotlin",
                    "master_brand_id" => 7
                ],
                [
                    "vehicle_name" => "Jeep",
                    "master_brand_id" => 8
                ],
                [
                    "vehicle_name" => "Di Indosiar Yang Biasa Dipake Sama Maling",
                    "master_brand_id" => 8
                ],
                [
                    "vehicle_name" => "RTX3000",
                    "master_brand_id" => 9
                ],
                [
                    "vehicle_name" => "Gw ga ngerti motor",
                    "master_brand_id" => 9
                ]
            ]);
    }
}
