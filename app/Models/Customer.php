<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'age',
        'address',
        'company_id',
        'job',
        'customer_type',
        'employee_code',
        'user_id'
    ];

    public function orders()
    {
        $this->hasMany(Order::class);
    }

    public function users()
    {
        $this->belongsToMany(User::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'company_id', '_id');
    }
}
