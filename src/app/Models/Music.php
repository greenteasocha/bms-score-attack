<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['musicName', 'totalNotes', 'downloadLink'];
    protected $table = 'Musics';
    protected $primaryKey = 'musicId';
    public $timestamps = false;
    
}
