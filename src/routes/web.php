<?php

// namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $contests = [
        'contests' => [
            'id' => '1',
            'name' => 'taro',
        ]
    ];
    // return $contests;
    $musics = DB::select('select * from Musics', [1]);
    Log::debug($musics);
    Log::debug('home page!');
    return view("home");
});  



Route::post('/home', function (){ 
    Log::debug('POST CREATED!!!!!');
});


Route::get('/users/{userId}', function ($userId) {
    $userName = 'user' . (string)$userId;
    Log::debug('Type of userId: ');
    Log::debug(gettype($userId));

    $userData = [
        'userId' => $userId,
        'userName' => $userName,
    ];

    return $userData;
});

Route::get('/contests/{contestId}', function($contestId) { 
    $music = ["music A", "music B", "music C"][$contestId % 3];

    $contestData = [
        "BasicInfo" => [
            'contestId' => $contestId,
            'musicName' => $music,
            'holdedDate' => date('Ymd'),
        ],
        "RankingData" => [
            ["userId" => 1,
            "name" =>  "user1",
            "score" => 4000,
            "comment" => ""],
            ['userId' => 2,
            "name" => "user2",
            "score" => 3900,
            "comment" => "good"]
        ],
    ];

    return view("rankings", ['basicInfo' => $contestData["BasicInfo"], 'rankingData' => $contestData["RankingData"]]);
    // return $contestData;
});

Route::post('/contests/{contestId}', function($contestId) {
    Log::debug('< contest score >  POST CREATED!!!!!');
    print('Successfully posted on contest: ' . $contestId);
});

Route::get('/users/{userId}', function($userId) {

    $user = [
        'userId' => $userId,
        'userName' => 'Taro',
    ];

    return view('user', ['user' => $user]);
});


Route::get('blade', function () {
    return view('child');
});

Route::get('greeting', function () {
    return view('welcome', ['name' => 'Samantha']);
});