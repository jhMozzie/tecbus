<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Desarrollo Web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Diseño Web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Programación', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
