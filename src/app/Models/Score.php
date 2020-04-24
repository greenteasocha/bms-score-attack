<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['contestId', 'score', 'userId', 'comment'];
    protected $table = 'scores';
    protected $primaryKey = 'id';

    public function contest()
    {
        return $this->belongsTo('App\Models\Contest', 'contestId');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId');
    }
   
}
