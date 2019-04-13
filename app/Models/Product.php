<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'description',
        'price',
        'sale_price',
        'image',
        'active',
        'active_on_slider'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 
}