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
                'dni' => 12345670,
                'phone' => '987654321',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 3, // 3 es el ID para el tipo de usuario 'Administrador'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Conductor',
                'lastname' => 'ConductorLastname',
                'email' => 'conductor@tecsup.edu.pe',
                'dni' => 12345672,
                'phone' => '987600401',
                'password' => Hash::make('tengosed'),
                'user_type_id' => 4, // 3 es el ID para el tipo de usuario 'Administrador'
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
