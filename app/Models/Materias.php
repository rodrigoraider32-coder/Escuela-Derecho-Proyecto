<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'code',
        'semestre',
        'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'materia_id');
    }
}