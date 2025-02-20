<?php

namespace Database\Seeders;

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
        $vehicle_types = [
            ['name' => 'Mazda'],
            ['name' => 'Toyota'],
            ['name' => 'Suzuki'],
            ['name' => 'Chevrolet']
        ];

        foreach ($vehicle_types as $vehicle_type) {
            Vehicle_Type::create($vehicle_type);
        }
    }
}
