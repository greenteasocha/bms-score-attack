<?php

namespace App\Http\Controllers;

use Carbon\Traits\Date;
use Illuminate\Http\Request;
use App\Models\Contest;

class TopPageController extends Controller
{
    public function getTopPage(){
        // $date = date('Y-m-d');
        $date = '2020-04-02'; // test data
        $contest = Contest::where('eventDate', $date)->first();
        
        return view("home", ["contest" => $contest]);
    }
}
