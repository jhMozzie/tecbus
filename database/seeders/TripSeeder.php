<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén IDs de rutas y conductores de autobús existentes
        $routeIds = DB::table('routes')->pluck('id');
        $busDriverIds = DB::table('bus_drivers')->pluck('id');

        $tripDatesAndTimes = [
            '2023-12-18 07:15',
            '2023-12-18 07:20',
            '2023-12-18 18:10',
            '2023-12-18 18:10',
            '2023-12-18 18:10',
            '2023-12-18 18:10',
            '2023-12-18 22:20',
            '2023-12-19 07:15',
            '2023-12-19 07:20',
            '2023-12-19 18:10',
            '2023-12-19 18:10',
            '2023-12-19 18:10',
            '2023-12-19 18:10',
            '2023-12-19 22:20',
        ];

        // Agrupa las fechas
        $groupedTrips = collect($tripDatesAndTimes)->groupBy(function ($dateTime) {
            return Carbon::parse($dateTime)->format('Y-m-d');
        });

        // Realiza inserciones en la tabla de viajes
        foreach ($groupedTrips as $date => $tripsForDate) {
            foreach ($routeIds as $routeId) {
                // Selecciona un conductor de autobús al azar
                $busDriverId = $busDriverIds->random();

                // Selecciona la fecha y hora para ese día
                $dateTime = $tripsForDate->shift(); // Cambio aquí

                $carbonDateTime = Carbon::parse($dateTime);

                // Puedes ajustar los valores según tus necesidades
                DB::table('trips')->insert([
                    'route_id' => $routeId,
                    'bus_driver_id' => $busDriverId,
                    'trip_date' => $carbonDateTime,
                    'student_capacity' => rand(20, 30),
                    'professor_capacity' => rand(1, 3),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
