<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['userName', 'password'];
    protected $table = 'users';
    protected $primaryKey = 'id';
    
}
