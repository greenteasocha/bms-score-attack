<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;

class UserPageController extends Controller
{
    public function aggregateUserData($userId){
        $aggregatedUserHistories = array();
        $user = User::where('id', $userId)->first();
        $scores = Score::where('userId', $userId)->get();

        foreach ($scores as $score){
            $contest = $score->contest;
            $music = $contest->music;
            array_push($aggregatedUserHistories, [
                'eventDate' => $contest->eventDate,
                'contestId' => $contest->id,
                'musicName' => $music->musicName,
                'score' => $score->score,
            ]);
        }
    
        // contestId順にソート
        foreach ($aggregatedUserHistories as $key => $value) {
            $sort[$key] = $value['contestId'];
        }
        array_multisort($sort, SORT_DESC, $aggregatedUserHistories);
        
        // return ['scores' => $scores];
        return view("user", ['basicInfo'=> $user, 'scores' => $aggregatedUserHistories]);
        // return $music->music->musicName;
    }
}
