<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'total_sold',
        'price',
        'quantity',
        'image',
        'category_id',
    ];

    public function orders()
    {
        $this->belongsToMany(Order::class);
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
