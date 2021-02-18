<?php

use Illuminate\Database\Seeder;

use App\Model\MasterBrand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterBrand
            ::insert([
                [
                    "brand_name" => "Toyota",
                    "brand_type" => MasterBrand::MOBIL
                ],
                [
                    "brand_name" => "Honda",
                    "brand_type" => MasterBrand::MOBIL
                ],
                [
                    "brand_name" => "Suzuki",
                    "brand_type" => MasterBrand::MOTOR
                ],
                [
                    "brand_name" => "Yamaha",
                    "brand_type" => MasterBrand::MOTOR
                ],
                [
                    "brand_name" => "Tesla",
                    "brand_type" => MasterBrand::MOBIL
                ],
                [
                    "brand_name" => "Mitsubisi",
                    "brand_type" => MasterBrand::MOBIL
                ],
                [
                    "brand_name" => "Suzuki",
                    "brand_type" => MasterBrand::MOBIL
                ],
                [
                    "brand_name" => "Jeep",
                    "brand_type" => MasterBrand::MOBIL
                ],
                [
                    "brand_name" => "Ninja",
                    "brand_type" => MasterBrand::MOTOR
                ]
            ]);
    }
}
