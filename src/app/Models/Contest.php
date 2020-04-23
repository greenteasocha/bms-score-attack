<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = ['musicId', 'eventDate', 'contestDivision'];
    protected $table = 'contests';
    protected $primaryKey = 'id';

    public function music()
    {
        return $this->belongsTo('App\Models\Music', 'musicId');
    }

    public function scores()
    {
        return $this->hasMany('App\Models\Score', 'contestId');
    }

}
