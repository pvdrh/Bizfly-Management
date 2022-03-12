<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    const STATUS = [
        'pending' => 0,
        'approved' => 1,
    ];

    protected $fillable = [
        'code',
        'status',
        'product_id',
        'created_at',
        'note',
        'total'
    ];

    public function customers()
    {
        return $this->hasOne(Customer::class, '_id', 'customer_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
