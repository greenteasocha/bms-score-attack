<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Contest;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use App\Services\ContestService;

class ContestPageController extends Controller
{
    protected $ContestService;
    public function __construct(ContestService $contest_service)
    {
        $this->contestService = $contest_service;
    }

    public function showAllContests(){
        return $this->contestService->showAllContests();
    }

    public function aggregateRankingData($contestId){

        $contestPageData = $this->contestService->getContestData($contestId);

        return view("rankings", $contestPageData);
    }

    public function handlePostedScore(Request $request, $contestId){
        $contestPageData = $this->contestService->postScore($request, $contestId);
        // // (存在すれば)そのプレイヤーが過去に提出したハイスコアをチェック
        // $previousScore = Score::where('contestId', $contestId)->where('userId', $request['userId'])->first();
        
        // if (is_null($previousScore)) {
        //     // 初提出の場合、レコードを作成
        //     $score = new Score();
        //     $score->fill([
        //         'userId' => $request["userId"],
        //         'contestId' => $contestId,
        //         'score' => $request["score"],
        //         'comment' => $request["comment"],
        //     ])->save();
        //     return redirect('/contests/' . $contestId);
        // } elseif ($request['score'] > $previousScore['score']) {
        //     $previousScore->score = $request['score'];
        //     $previousScore->comment = $request['comment'];
        //     $previousScore->save();
        //     return redirect('/contests/' . $contestId);
        // } else {
            return redirect('/contests/' . $contestId);
        // }
    }
}
