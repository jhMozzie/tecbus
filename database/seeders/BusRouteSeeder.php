<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routesData = [
            [
                'name' => 'Av. Aviacion - J. Prado - Campus',
                'service_day' => 'Lunes a Viernes',
                'departure_time' => '7:15 AM',
                'direction' => 'Paradero Inicial a Tecsup',
                'turn' => 'Mañana',
                'busstops' => [
                    'Altura Cine Star Aviación (a una cuadra de Av. J. Prado)',
                    'Av. Javier Prado con la Ca. Velasquez (a 1 cdra. de San Luis)',
                    'Paradero Av. Frutales con Av. Javier Prado',
                ],
            ],
            [
                'name' => 'Puente Nuevo - Campus',
                'service_day' => 'Lunes a Viernes',
                'departure_time' => '7:20 AM',
                'direction' => 'Paradero Inicial a Tecsup',
                'turn' => 'Mañana',
                'busstops' => [
                    'Puente Nuevo (Altura Grifo Repsol)',
                    'Campus',
                ],
            ],
            [
                'name' => 'Campus - Av. J. Prado - Ovalo La Perla',
                'service_day' => 'Lunes a Viernes',
                'departure_time' => '6:10 PM',
                'direction' => 'Tecsup a Paradero Final', // Ajusta según tu modelo
                'turn' => 'Mañana',
                'busstops' => [
                    'Campus',
                    'Paradero U. de Lima (J. Prado) por la vía auxiliar',
                    'Paradero Av. Javier Prado con Av. Agustín de la Rosa Toro',
                    'Paradero Av. Javier Prado con Av. San Luis',
                    'Paradero Av. Javier Prado con Av. Aviación',
                    'Paradero Av. J. Prado con Calle Las Orquídeas (antes de la Clínica J. Prado)',
                    'Paradero Av. J. Prado con Av. Petit Thouars',
                    'Paradero Av. J. Prado con Av. Las Palmeras',
                    'Paradero Av. J. Prado con Av. Los Álamos',
                    'Paradero Av. J. Prado con Av. Las Flores',
                    'Paradero Av. J. Prado con Calle Roma (antes de Salaverry)',
                    'Paradero San Felipe (Av. Gregorio Escobedo con Av. Sánchez Carrión)',
                    'Paradero Av. La Marina con Av. Sucre',
                    'Paradero Av. La Marina con Av. Universitaria',
                    'Paradero Av. La Marina con Av. Rafael Escardo (Hiraoka)',
                    'Paradero Av. La Marina con Av. Faucett',
                    'Paradero Óvalo La Perla',
                ],
            ],
            [
                'name' => 'Campus - Chaclacayo',
                'service_day' => 'Lunes a Viernes',
                'departure_time' => '6:10 PM',
                'direction' => 'Tecsup a Paradero Final', // Ajusta según tu modelo
                'turn' => 'Tarde',
                'busstops' => [
                    'Campus',
                    'Paradero Estadio Vitarte (Hospital de Emergencia Vitarte)',
                    'Paradero Santa Clara (Costado Real Plaza)',
                    'Paradero Horacio',
                    'Paradero Huaycán',
                    'Paradero Ñaña',
                    'Paradero El Cuadro',
                    'Paradero Los Álamos',
                    'Paradero Plaza Chaclacayo',
                ],
            ],
            [
                'name' => 'Campus - Puente Atocongo',
                'service_day' => 'Lunes a Viernes',
                'departure_time' => '6:10 PM',
                'direction' => 'Tecsup a Paradero Final', // Ajusta según tu modelo
                'turn' => 'Tarde',
                'busstops' => [
                    'Campus',
                    'Paradero Evitamiento (Trébol)',
                    'Paradero Pte. Primavera',
                    'Paradero Prosegur',
                    'Paradero Pte. Benavides (Abajo)',
                    'Paradero Tottus (Mall Atocongo)',
                ],
            ],
            [
                'name' => 'Campus - Mega Plaza',
                'service_day' => 'Lunes a Viernes',
                'departure_time' => '6:10 PM',
                'direction' => 'Tecsup a Paradero Final', // Ajusta según tu modelo
                'turn' => 'Tarde',
                'busstops' => [
                    'Campus',
                    'Paradero Puente Trujillo',
                    'Paradero Caqueta',
                    'Paradero Habich',
                    'Paradero 2da. de Palao',
                    'Paradero Jardines',
                    'Paradero Plaza Norte',
                    'Paradero Mega Plaza',
                ],
            ],
            [
                'name' => 'Campus - Av. J. Prado - Petit Thouars',
                'service_day' => 'Lunes a Viernes',
                'departure_time' => '10:20 PM',
                'direction' => 'Tecsup a Paradero Final', // Ajusta según tu modelo
                'turn' => 'Noche',
                'busstops' => [
                    'Campus',
                    'Paradero Puente Trujillo',
                    'Paradero Caqueta',
                    'Paradero Habich',
                    'Paradero 2da. de Palao',
                    'Paradero Jardines',
                    'Paradero Plaza Norte',
                    'Paradero Mega Plaza',
                ],
            ],
        ];

        foreach ($routesData as $routeData) {
            $routeId = DB::table('routes')->insertGetId([
                'name' => $routeData['name'],
                'service_day' => $routeData['service_day'],
                'departure_time' => $routeData['departure_time'],
                'direction' => $routeData['direction'],
                'turn' => $routeData['turn'],
            ]);

            foreach ($routeData['busstops'] as $order => $busstopName) {
                $busstopId = DB::table('busstops')->insertGetId(['name' => $busstopName]);

                DB::table('bus_route')->insert([
                    'route_id' => $routeId,
                    'bus_stop_id' => $busstopId,
                    'order' => $order + 1,
                ]);
            }
        }
    }
}
