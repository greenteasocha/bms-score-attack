<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Contest;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class ContestPageController extends Controller
{
    public function aggregateRankingData($contestId){
        Log::debug($contestId);
        $aggregatedScores = array();
        
        $contest = Contest::where('id', $contestId)->first();
        $scores = $contest->scores;

        foreach ($scores as $score){
            $user = $score->user;
            Log::debug($score);
            array_push($aggregatedScores, [
                'userId' => $user->id,
                'name' => $user->userName,
                'score' => $score->score,
                'comment' => $score->comment
            ]);
        }
    
        // score順にソート
        foreach ($aggregatedScores as $key => $value) {
            $sort[$key] = $value['score'];
        }
        array_multisort($sort, SORT_DESC, $aggregatedScores);
        
        $authInfo = Auth::user();
        // return ['scores' => $aggregatedScores];
        return view("rankings", ['basicInfo'=> $contest, 'authInfo' => $authInfo, 'scores' => $aggregatedScores]);
        // return $music->music->musicName;
    }

    public function handlePostedScore(Request $request, $contestId){

        // ここにDB INSERT または UPDATE処理をかく
        $previousScore = Score::where('contestId', $contestId)->where('userId', $request['userId'])->first();
        
        if (is_null($previousScore)) {
            // 初提出の場合、レコードを作成
            $score = new Score();
            $score->fill([
                'userId' => $request["userId"],
                'contestId' => $contestId,
                'score' => $request["score"],
                'comment' => $request["comment"],
            ])->save();
            return redirect('/contests/' . $contestId);
        } elseif ($request['score'] > $previousScore['score']) {
            // ここにUPDATEの処理を書く
            $previousScore->score = $request['score'];
            $previousScore->comment = $request['comment'];
            $previousScore->save();
            return redirect('/contests/' . $contestId);
        } else {
            return 'none';
            // 一応なんかかく？
        }
    }

}
