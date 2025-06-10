<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['reservation_id', 'status'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function dishes()
    {
        return $this->hasManyThrough(Dish::class, OrderItem::class, 'order_id', 'id', 'id', 'dish_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function gerechten()
    {
        return $this->hasManyThrough(Dish::class, OrderItem::class, 'order_id', 'id', 'id', 'dish_id');
    }
}
