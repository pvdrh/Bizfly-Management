<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class CustomerHistory extends Model
{
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'age',
        'job',
        'address',
        'gender',
        'customer_type',
        'employee_code',
        'updatedBy',
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'updatedBy', '_id');
    }
}
