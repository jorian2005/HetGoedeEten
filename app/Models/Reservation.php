<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'number_of_guests', 'status', 'date', 'time'];

    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bestellingen()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
