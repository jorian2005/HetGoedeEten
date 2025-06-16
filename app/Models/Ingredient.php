<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Ingredient extends Pivot
{
    protected $table = 'ingredients';
    protected $fillable = ['dish_id', 'article_id'];

    public $incrementing = false;
    protected $primaryKey = ['dish_id', 'article_id'];

    public function gerecht()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }

    public function artikel()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
