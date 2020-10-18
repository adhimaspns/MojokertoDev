<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Untuk menspesifikasikan tabel yang ingin di jadikan Auth
use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth
{
    protected $table = "users";

    protected $fillable = ['name', 'back_name', 'address', 'city', 'region', 'phone', 'age', 'username', 'email', 'password', 'token', 'foto', 'role', 'remember_token'];

    protected $guard = ['id'];
}
