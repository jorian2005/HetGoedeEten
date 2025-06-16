<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'chefs';

    protected $fillable = [
        'name',
        'specialty',
        'experience_years',
        'restaurant_id',
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function ingredienten()
    {
        return $this->hasMany(Ingredient::class);
    }
}
