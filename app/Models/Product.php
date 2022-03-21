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

    protected $appends = ['image_src'];

    public function getImageSrcAttribute()
    {
        $link = '';

        if ($this->image) {
            $link = env('APP_URL') . '/storage/' . $this->image;
        } else {
            $link = env('APP_URL') . '/backend/dist/img/default.jpg';
        }

        return $link;
    }

    public function orders()
    {
        $this->belongsToMany(Order::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id', '_id');
    }
}
