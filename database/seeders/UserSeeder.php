<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades;
use App\Models\User;
use Laravel\Jetstream\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Profesor Ejemplo',
            'email' => 'profe@escuela.com',
            'password' => Hash::make('12345678'),
            'role' => 'maestro',
        ]);

        User::create([
            'name' => 'Alumno Ejemplo',
            'email' => 'alumno@escuela.com',
            'password' => Hash::make('12345678'),
            'role' => 'alumno',
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@escuela.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);
    }
}
