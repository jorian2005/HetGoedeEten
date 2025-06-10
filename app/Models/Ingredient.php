<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['dish_id', 'article_id'];

    public function gerecht()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }

    public function artikel()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
