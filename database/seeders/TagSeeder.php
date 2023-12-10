<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'Laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Livewire', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Php', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Javascript', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tailwind', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
