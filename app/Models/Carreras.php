<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carreras extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'code',
    ];

    public function alumnos()
    {
        return $this->hasMany(User::class, 'carrera_id');
    }

    public function carrera()
    {
        return $this->hasMany(Materias::class, 'carrera_id');
    }
}
