<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'description', 'price', 'category', 'stock'];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}