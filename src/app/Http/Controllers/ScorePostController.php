<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScorePostController extends Controller
{
    public function loggingPostedContents(Request $request, $contestId){
        Log::debug('Ranking score posted.');
        Log::debug($request['userName']);
        Log::debug($request['score']);
        Log::debug($request['comment']);
        Log::debug($contestId);
    }
    
}
