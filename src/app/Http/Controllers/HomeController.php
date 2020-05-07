<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $date = '2020-04-01'; // test data
        $contest = Contest::where('eventDate', $date)->first();
        return view('home2', ['contest'=>$contest]);
    }
}
