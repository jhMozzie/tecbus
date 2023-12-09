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
                'dni' => 72299120,
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
                'dni' => 75599120,
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
                'dni' => 70099120,
                'password' => Hash::make('tengosed'),
                'user_type_id' => 3, // Asegúrate de que el ID coincida con el tipo de usuario 'Administrador'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alvaro',
                'lastname' => 'Lluvians',
                'email' => 'lluvians@tecsup.edu.pe',
                'phone' => '333333333',
                'dni' => 70099100,
                'password' => Hash::make('tengosed'),
                'user_type_id' => 4, // Asegúrate de que el ID coincida con el tipo de usuario 'Administrador'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Profesor',
                'lastname' => 'ProfesorLastname',
                'email' => 'profesor@tecsup.edu.pe',
                'dni' => 56789012,
                'phone' => '345678901',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 2, // 2 es el ID para el tipo de usuario 'Profesor'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Estudiante',
                'lastname' => 'EstudianteLastname',
                'email' => 'estudiante@tecsup.edu.pe',
                'dni' => 87654321,
                'phone' => '456789012',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 1, // 1 es el ID para el tipo de usuario 'Estudiante'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'lastname' => 'AdminLastname',
                'email' => 'admin@tecsup.edu.pe',
                'dni' => 12345678,
                'phone' => '987654321',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 3, // 3 es el ID para el tipo de usuario 'Administrador'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
