<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmitHistory extends Model
{
    protected $fillable = ['scoreId', 'userId'];
    protected $table = 'SubmitHistory';
    protected $primaryKey = 'historyId';
    public $timestamps = false;
}
