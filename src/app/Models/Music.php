<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['musicName', 'totalNotes', 'LR2Link'];
    protected $table = 'musics';
    protected $primaryKey = 'id';


    public function contest()
    {
        return $this->hasOne('App\Models\Contest', 'musicId');
    }


}
