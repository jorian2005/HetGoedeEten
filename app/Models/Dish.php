<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $fillable = ['name', 'description', 'price', 'type'];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'ingredients', 'dish_id', 'article_id')
            ->using(Ingredient::class);
    }

    public function dishIngredients(): HasMany
    {
        return $this->hasMany(Ingredient::class, 'dish_id');
    }

    public function bestellingen()
    {
        return $this->hasMany(Order::class);
    }
}
