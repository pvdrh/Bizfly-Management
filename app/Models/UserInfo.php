<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'gender',
        'user_id',
        'role_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
