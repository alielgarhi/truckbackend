<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',       // Add this
        'location',      // Add this
        'size',          // Add this
        'weight',        // Add this
        'status',        // Add this
        'pickup_time',   // Add this
        'delivery_time', // Add this
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

