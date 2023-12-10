<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create(
            [
                'dni' => '87654000', // Puedes ajustar este valor según tus necesidades
                'name' => 'Alan',
                'lastname' => 'García',
                'phone' => '999999000',
                'license_number' => 'Q87654000',
                'license_type' => 'A-IIIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654001', // Puedes ajustar este valor según tus necesidades
                'name' => 'Pedro',
                'lastname' => 'Castillo',
                'phone' => '999999001',
                'lincense_number' => 'Q87654001',
                'lincense_type' => 'A-IIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654002', // Puedes ajustar este valor según tus necesidades
                'name' => 'Ollanta',
                'lastname' => 'Humala',
                'phone' => '999999002',
                'lincense_number' => 'Q87654002',
                'lincense_type' => 'A-IIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654003', // Puedes ajustar este valor según tus necesidades
                'name' => 'Alejandro',
                'lastname' => 'Toledo',
                'phone' => '999999003',
                'lincense_number' => 'Q87654003',
                'lincense_type' => 'A-IIA',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        );
    }
}
