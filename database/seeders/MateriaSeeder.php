<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materias;
use App\Models\Carreras;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carrera = Carreras::firstOrCreate(
            ['id' => 1],
            ['nombre' => 'Ingeniería en Sistemas', 'code' => 'IS-001']);

        Materias::create([
            'nombre' => 'Programación Web',
            'code' => 'PW-101',
            'semestre' => 1,
            'carrera_id' => 1,
        ]);

        Materias::create([
            'nombre' => 'Bases de Datos',
            'code' => 'BD-201',
            'semestre' => 2,
            'carrera_id' => 1,
        ]);
    }
}
