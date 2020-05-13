<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Music;
use App\Models\Contest;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class HomeService{

    public function getHomeContents(){
        // homeに表示するための、直近7日感のコンテストデータを取得
        $eventDate = date("Y-m-d");
        $recent_contests = Array();

        for($i = 0; $i < 7; $i++){ 
            $foundContest = Contest::where('eventDate', $eventDate)->first();
            array_push($recent_contests, $foundContest);
            $eventDate = date("Y-m-d", strtotime($eventDate . "-1 day"));
        }
        
        // $recent_contests = Contest::orderBy('id', 'desc')->limit(7)->get();
        $contestsData = array();
        foreach ($recent_contests as $contest) {
            $music = $contest->music;
            array_push($contestsData, [
                'id' => $contest->id,
                'eventDate' => $contest->eventDate,
                'contestDivision' => $contest->contestDivision,
                'musicName' => $music->musicName, 
            ]);
        }
        return $contestsData;
    }
}