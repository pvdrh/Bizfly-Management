<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone'
    ];

//    public function customers(){
//        return $this->hasMany(Customer::class);
//    }
}
