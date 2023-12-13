<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('routes')->insert([
            [
                'name' => 'Av. Aviacion - J. Prado - Campus',
                'service_day' => 'Lunes - Viernes',
                'departure_time' => '7:15 AM',
                'direction' => 'Paradero Inicial a Tecsup',
                'turn' => 'Mañana',
            ], [
                'name' => 'Puente Nuevo - Campus',
                'service_day' => 'Lunes - Viernes',
                'departure_time' => '7:20 AM',
                'direction' => 'Paradero Inicial a Tecsup',
                'turn' => 'Mañana',
            ],
            // [
            //     'name' => 'Campus - Av. J. Prado - Ovalo La Perla',
            //     'service_day' => 'Lunes a Viernes',
            //     'departure_time' => '6:10 PM',
            //     'turn' => 'Mañana',
            // ],
            // [
            //     'name' => 'Campus - Chaclacayo',
            //     'service_day' => 'Lunes a Viernes',
            //     'departure_time' => '6:10 PM',
            //     'turn' => 'Tarde',
            // ],
            // [
            //     'name' => 'Campus - Puente Atocongo',
            //     'service_day' => 'Lunes a Viernes',
            //     'departure_time' => '6:10 PM',
            //     'turn' => 'Tarde',
            // ], [
            //     'name' => 'Campus - Mega Plaza',
            //     'service_day' => 'Lunes a Viernes',
            //     'departure_time' => '6:10 PM',
            //     'turn' => 'Tarde',
            // ],
            // [
            //     'name' => 'Campus - Av. J. Prado - Petit Thouars',
            //     'service_day' => 'Lunes a Viernes',
            //     'departure_time' => '10:20 PM',
            //     'turn' => 'Noche'
            // ],
        ]);
    }
}
