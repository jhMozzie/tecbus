<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buses')->insert([
            [
                'license_plate' => 'ABC123',
                'model' => 'Travego',
                'brand' => 'Mercedes-Benz',
                'soat' => 'La Positiva',
                'capacity' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'license_plate' => 'XYZ456',
                'model' => 'Crossway',
                'brand' => 'Iveco',
                'soat' => 'Rimac Seguros',
                'capacity' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'license_plate' => 'LMN789',
                'model' => '9900',
                'brand' => 'Volvo',
                'soat' => 'Mapfre',
                'capacity' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'license_plate' => 'PQR012',
                'model' => 'Coach',
                'brand' => 'MAN',
                'soat' => 'Vivir Seguros',
                'capacity' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'license_plate' => 'STU345',
                'model' => 'S 431 DT',
                'brand' => 'Setra',
                'soat' => 'Protecta',
                'capacity' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
