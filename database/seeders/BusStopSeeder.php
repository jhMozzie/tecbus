<?php

namespace Database\Seeders;

use App\Models\BusStop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('busstops')->insert([
            ['name' => ' Altura Cine Star Aviación (a una cuadra de Av. J. Prado)',],
            ['name' => ' Av. Javier Prado con la Ca. Velasquez (a 1 cdra. de San Luis)',],

            ['name' => 'Puente Nuevo (Altura Grifo Repsol)',],
            // ['name' => 'Paradero Av. Frutales con Av. Javier Prado'],

            // ['name' => 'Paradero U. de Lima (J. Prado) por la vía auxiliar'],
            // ['name' => 'Paradero Av. Javier Prado con Av. Agustín de la Rosa Toro'],
            // ['name' => 'Paradero Av. Javier Prado con Av. San Luis'],
            // ['name' => 'Paradero Av. Javier Prado con Av. Aviación'],
            // ['name' => 'Paradero Av. J. Prado con Calle Las Orquídeas (antes de la Clínica J. Prado)'],
            // ['name' => 'Paradero Av. J. Prado con Av. Petit Thouars'],
            // ['name' => 'Paradero Av. J. Prado con Av. Las Palmeras'],
            // ['name' => 'Paradero Av. J. Prado con Av. Los Álamos'],
            // ['name' => 'Paradero Av. J. Prado con Av. Las Flores'],
            // ['name' => 'Paradero Av. J. Prado con Calle Roma (antes de Salaverry)'],
            // ['name' => 'Paradero San Felipe (Av. Gregorio Escobedo con Av. Sánchez Carrión)'],
            // ['name' => 'Paradero Av. La Marina con Av. Sucre'],
            // ['name' => 'Paradero Av. La Marina con Av. Universitaria'],
            // ['name' => 'Paradero Av. La Marina con Av. Rafael Escardo (Hiraoka)'],
            // ['name' => 'Paradero Av. La Marina con Av. Faucett'],
            // ['name' => 'Paradero Óvalo La Perla'],

            // ['name' => 'Estadio Vitarte (Hospital de Emergencia Vitarte)'],
            // ['name' => 'Paradero Santa Clara (Costado Real Plaza)'],
            // ['name' => 'Paradero Horacio'],
            // ['name' => 'Paradero Huaycán'],
            // ['name' => 'Paradero Ñaña'],
            // ['name' => 'Paradero El Cuadro'],
            // ['name' => 'Paradero Los Álamos'],
            // ['name' => 'Paradero Plaza Chaclacayo'],

            // ['name' => 'Paradero Evitamiento (Trébol)'],
            // ['name' => 'Paradero Pte. Primavera'],
            // ['name' => 'Paradero Prosegur'],
            // ['name' => 'Paradero Pte. Benavides (Abajo)'],
            // ['name' => 'Paradero Tottus (Mall Atocongo)'],

            // ['name' => 'Paradero Puente Trujillo'],
            // ['name' => 'Paradero Caqueta'],
            // ['name' => 'Paradero Habich'],
            // ['name' => 'Paradero 2da. de Palao'],
            // ['name' => 'Paradero Jardines'],
            // ['name' => 'Paradero Plaza Norte'],
            // ['name' => 'Paradero Mega Plaza'],

            // ['name' => 'Paradero Av. Frutales con Av. Javier Prado'],
            // ['name' => 'Paradero U. de Lima (J. Prado) por la vía auxiliar'],
            // ['name' => 'Paradero Av. Javier Prado con Av. Agustín de la Rosa Toro'],
            // ['name' => 'Paradero Av. Javier Prado con Av. San Luis'],
            // ['name' => 'Paradero Av. Javier Prado con Av. Aviación'],
            // ['name' => 'Paradero Ricardo Palma (J. Prado)'],
            // ['name' => 'Paradero Av. J. Prado con Calle Las Orquídeas (antes de la Clínica J. Prado)'],
            // ['name' => 'Paradero Av. J. Prado con Av. Petit Thouars'],

        ]);
    }
}
