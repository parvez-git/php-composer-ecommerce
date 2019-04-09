<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'billing_address',
        'total_amount',
        'payment_status',
        'payment_details'
    ];

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}