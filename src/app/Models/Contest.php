<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = ['musicId', 'holdedDate', 'contestDivision'];
    protected $table = 'Contests';
    protected $primaryKey = 'contestId';
    public $timestamps = false;
}
