<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Customer extends Model
{
    const CUSTOMER_TYPE = [
        'guest' => 0,
        'loyal' => 1,
    ];

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'age',
        'address',
        'company_id',
        'job',
        'customer_type',
        'user_id'
    ];

    public function orders(){
        $this->belongsToMany(Order::class);
    }

    public function users(){
        $this->belongsToMany(User::class);
    }
}
