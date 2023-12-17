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
        DB::table('drivers')->insert([
            [
                'dni' => '87654000',
                'name' => 'Alan',
                'lastname' => 'García',
                'phone' => '999999000',
                'license_number' => 'Q87654000',
                'license_type' => 'A-IIIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654001',
                'name' => 'Pedro',
                'lastname' => 'Castillo',
                'phone' => '999999001',
                'license_number' => 'Q87654001',
                'license_type' => 'A-IIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654002',
                'name' => 'Ollanta',
                'lastname' => 'Humala',
                'phone' => '999999002',
                'license_number' => 'Q87654002',
                'license_type' => 'A-IIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654003',
                'name' => 'Alejandro',
                'lastname' => 'Toledo',
                'phone' => '999999003',
                'license_number' => 'Q87654003',
                'license_type' => 'A-IIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654004',
                'name' => 'Nicola',
                'lastname' => 'Porcella',
                'phone' => '999999004',
                'license_number' => 'Q87654004',
                'license_type' => 'A-IIIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654005',
                'name' => 'Jimmy',
                'lastname' => 'Santi',
                'phone' => '999999005',
                'license_number' => 'Q87654005',
                'license_type' => 'A-IIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654006',
                'name' => 'Juliana',
                'lastname' => 'Oxenford',
                'phone' => '999999006',
                'license_number' => 'Q87654006',
                'license_type' => 'A-IIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654007',
                'name' => 'Juliana',
                'lastname' => 'Oxenford',
                'phone' => '999999007',
                'license_number' => 'Q87654007',
                'license_type' => 'A-IIIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654008',
                'name' => 'Bruno',
                'lastname' => 'Pinasco',
                'phone' => '999999008',
                'license_number' => 'Q87654008',
                'license_type' => 'A-IIIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654009',
                'name' => 'Jonathan',
                'lastname' => 'Maicelo',
                'phone' => '999999009',
                'license_number' => 'Q87654009',
                'license_type' => 'A-IIIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654010',
                'name' => 'Jonathan',
                'lastname' => 'Maicelo',
                'phone' => '999999010',
                'license_number' => 'Q87654010',
                'license_type' => 'A-IIIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654011',
                'name' => 'Jonathan',
                'lastname' => 'Maicelo',
                'phone' => '999999011',
                'license_number' => 'Q87654011',
                'license_type' => 'A-IIIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654011',
                'name' => 'Jonathan',
                'lastname' => 'Maicelo',
                'phone' => '999999011',
                'license_number' => 'Q87654011',
                'license_type' => 'A-IIIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654012',
                'name' => 'Martin',
                'lastname' => 'Vizcarra',
                'phone' => '999999012',
                'license_number' => 'Q87654012',
                'license_type' => 'A-IIIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654013',
                'name' => 'Pedro Pablo',
                'lastname' => 'Kuczynski ',
                'phone' => '999999013',
                'license_number' => 'Q87654013',
                'license_type' => 'A-IIIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654014',
                'name' => 'Alberto',
                'lastname' => 'Fujimori  ',
                'phone' => '999999014',
                'license_number' => 'Q87654014',
                'license_type' => 'A-IIIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
