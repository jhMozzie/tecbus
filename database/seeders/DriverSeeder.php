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
        ]);
    }
}
