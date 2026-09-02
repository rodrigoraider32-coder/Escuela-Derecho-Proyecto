<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'titulo',
        'descripcion',
        'type',
        'status',
        'alumno_id',
        'maestro_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'alumno_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'maestro_id');
    }

    public function responses()
    {
        return $this->hasMany(TicketResponse::class);
    }
}
