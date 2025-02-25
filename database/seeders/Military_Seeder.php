<?php

namespace Database\Seeders;

use App\Models\Rank;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Military_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $military_ranks = [
            ['name' => 'Soldado'],
            ['name' => 'Cabo Segundo'],
            ['name' => 'Cabo Primero'],
            ['name' => 'Sargento Segundo'],
            ['name' => 'Sargento Primero'],
            ['name' => 'Suboficial segundo'],
            ['name' => 'Suboficial primero'],
            ['name' => 'Suboficial Mayor'],
            ['name' => 'Subteniente'],
            ['name' => 'Teniente'],
            ['name' => 'Capitán'],
            ['name' => 'Mayor'],
            ['name' => 'Teniente coronel'],
            ['name' => 'Coronel'],
            ['name' => 'General de brigada'],
            ['name' => 'General de división'],
            ['name' => 'General de Ejército'],
        ];

        foreach ($military_ranks as $military_rank) {
            Rank::create($military_rank);
        }

        $Units = [
            ['name' => 'BRIGADA DE INFANTEÍA 7 LOJA'],
            ['name' => 'BI 21 "MACARÁ"'],
            ['name' => 'BS 17 "ZUMBA"'],
        ];
        foreach ($Units as $Unit) {
            Unit::create($Unit);
        }


        foreach ($military_ranks as $military_rank) {
            Rank::create($military_rank);
        }

        $locations = [
            ['name' => 'EMPALME'],
            ['name' => 'SABIANGO'],
            ['name' => 'PREVENCIÓN'],
            ['name' => 'CENTRO MACARÁ'],
        ];
        foreach ($locations as $location) {
            Unit::create($location);
        }
    }
}
