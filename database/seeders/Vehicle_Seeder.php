<?php

namespace Database\Seeders;

use App\Models\Vehicle_Brand;
use App\Models\Vehicle_Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Vehicle_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle_brands = [
            ['name' => 'Chevrolet'],
            ['name' => 'Kia'],
            ['name' => 'Toyota'],
            ['name' => 'Hyundai'],
            ['name' => 'Chery'],
            ['name' => 'Great Wall'],
            ['name' => 'Nissan'],
            ['name' => 'Mazda'],
            ['name' => 'Ford'],
            ['name' => 'Audi'],

        ];
        foreach ($vehicle_brands as $vehicle_brand) {
            Vehicle_Brand::create($vehicle_brand);
        }


        $vehicle_types = [
            ['name' => 'JEEP'],
            ['name' => 'NPR'],
            ['name' => 'BUS'],
            ['name' => 'CAMIONETA'],
            ['name' => 'CAMIÓN'],
        ];
        foreach ($vehicle_types as $vehicle_type) {
            Vehicle_Type::create($vehicle_type);
        }
    }
}
