<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name', 'stock', 'stock_type', 'minimum_stock'];

    public function ingredienten()
    {
        return $this->hasMany(Ingredient::class);
    }
}
