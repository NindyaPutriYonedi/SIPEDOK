<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'role',
        'access_level'
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = false;
}
