<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['contestId', 'score', 'submittedAt'];
    protected $table = 'Scores';
    protected $primaryKey = 'scoreId';
    public $timestamps = false;
}
