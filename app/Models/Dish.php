<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['name', 'description', 'price', 'type'];

    public function bestellingen()
    {
        return $this->hasMany(Order::class);
    }

    public function ingredienten()
    {
        return $this->hasMany(Ingredient::class);
    }
}
