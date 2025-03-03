<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'user_id',
        'book_title',
        'author',
        'description',
        'condition',
        'contact_number',
        'pickup_address',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}