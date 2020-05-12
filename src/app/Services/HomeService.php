<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Music;
use App\Models\Contest;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class HomeService{

    public function getHomeContents(){
        $recent_contests = Contest::orderBy('id', 'desc')->limit(7)->get();
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