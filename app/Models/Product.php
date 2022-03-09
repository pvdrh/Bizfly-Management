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

//    protected $appends = ['image_src'];
//
//    public function getImageSrcAttribute()
//    {
//        $link = '';
//
//        if ($this->image) {
//            $link = env('APP_URL') . '/storage/' . $this->image;
//        }
//
//        return $link;
//    }

    public function orders()
    {
        $this->belongsToMany(Order::class);
    }

    public function category(){
        $this->belongsTo(Category::class);
    }
}
