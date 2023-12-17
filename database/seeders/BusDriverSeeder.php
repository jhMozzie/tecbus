<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén IDs de buses y drivers existentes
        $busIds = DB::table('buses')->pluck('id');
        $driverIds = DB::table('drivers')->pluck('id');

        // Realiza inserciones en la tabla intermedia
        foreach ($busIds as $busId) {
            // Asigna un número aleatorio de conductores a cada autobús
            $numberOfDrivers = rand(3, 10); // Puedes ajustar según tus necesidades
            $selectedDriverIds = $driverIds->random($numberOfDrivers);

            // Inserta en la tabla intermedia
            foreach ($selectedDriverIds as $driverId) {
                DB::table('bus_drivers')->insert([
                    'bus_id' => $busId,
                    'driver_id' => $driverId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
