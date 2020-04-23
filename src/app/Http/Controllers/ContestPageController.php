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
        $aggregatedScores = array();
        
        $music = Contest::where('id', $contestId)->first();
        $scores = $music->scores;

        foreach ($scores as $score){
            $user = $score->user;
            Log::debug($score);
            array_push($aggregatedScores, [
                'name' => $user->userName,
                'score' => $score->score,
            ]);
        }
        
        // score順にソート
        foreach ($aggregatedScores as $key => $value) {
            $sort[$key] = $value['score'];
        }
        array_multisort($sort, SORT_DESC, $aggregatedScores);
 
        return ['scores' => $aggregatedScores];

        // return $music->music->musicName;
    }
}
