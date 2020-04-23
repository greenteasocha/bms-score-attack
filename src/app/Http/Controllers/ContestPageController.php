<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Contest;

class ContestPageController extends Controller
{
    public function aggregateRankingData($contestId){
        Log::debug($contestId);
        $music = Contest::where('contestId', $contestId)->first();
        $scores = $music->scores;
        
        return ['scores' => $scores];

        // return $music->music->musicName;

        
        // Log::debug($request['userName']);
        // Log::debug($request['score']);
        // Log::debug($request['comment']);
    }
}
