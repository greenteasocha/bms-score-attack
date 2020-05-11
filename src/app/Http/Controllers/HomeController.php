<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;
use App\Services\HomeService;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeService $home_service)
    {
        $this->homeService = $home_service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $recentSevenContests =  $this->homeService->getHomeContents();
        $todaysContest = current($recentSevenContests);
        $pastSixContests = array_slice($recentSevenContests, 1, );
        
        $authInfo = Auth::user();
        // return $pastSixContests;

        return view('home', [
            'authInfo' => $authInfo,
            'todaysContest' => $todaysContest,
            'pastSixContests' => $pastSixContests,
        ]);
    }
}