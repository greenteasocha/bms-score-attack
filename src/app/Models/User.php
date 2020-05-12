<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['userName', 'password', 'email'];
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function scores()
    {
        return $this->hasMany('App\Models\Score', 'userId');
    }
    
}
