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
        
            return redirect('/contests/' . $contestId);
    }
}
