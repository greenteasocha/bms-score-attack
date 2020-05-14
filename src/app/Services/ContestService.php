<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Music;
use App\Models\Contest;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class ContestService{

    public function showAllContests(){

        $contests = Contest::all();
        $contestsData = array();
        foreach ($contests as $contest) {
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

    public function getContestData($contestId){
        // まずそのコンテストに関係するスコアを取得
        $aggregatedScores = array();
        $contest = Contest::where('id', $contestId)->first();
        $music = $contest->music;
        $basicInfo = [
            'eventDate' => $contest->eventDate,
            'contestId' => $contest->id,
            'musicName' => $music->musicName,
            'LR2Link' => $music->LR2Link,
        ];
        $authInfo = Auth::user();

        // return $contest;
        if (!$contest) {
             abort(404);
        }

        // ここからスコア集計
        $scores = $contest->scores;
        
        if ( count($scores) !== 0 ) {
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
        }   
    
        return [
            'basicInfo'=> $basicInfo, 
            'authInfo' => $authInfo, 
            'scores' => $aggregatedScores
        ];
    }

    public function postScore($request, $contestId){
         // (存在すれば)そのプレイヤーが過去に提出したハイスコアをチェック
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
         } elseif ($request['score'] > $previousScore['score']) {
             $previousScore->score = $request['score'];
             $previousScore->comment = $request['comment'];
             $previousScore->save();
         } 

         return;
    }

}