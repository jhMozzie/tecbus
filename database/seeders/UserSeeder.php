<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Joseph',
                'lastname' => 'Flores',
                'email' => 'joseph@tecsup.edu.pe',
                'phone' => '123456789',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 1, // Asegúrate de que el ID coincida con el tipo de usuario 'Estudiante'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kelly',
                'lastname' => 'Castillo',
                'email' => 'kelly@tecsup.edu.pe',
                'phone' => '946752980',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 2, // Asegúrate de que el ID coincida con el tipo de usuario 'Profesor'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hirotoshi',
                'lastname' => 'Santos',
                'email' => 'hirotoshi@tecsup.edu.pe',
                'phone' => '555555555',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 3, // Asegúrate de que el ID coincida con el tipo de usuario 'Administrador'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
