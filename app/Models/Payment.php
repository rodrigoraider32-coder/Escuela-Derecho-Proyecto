<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'concept',
        'amount',
        'status',
        'stripe_session_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
