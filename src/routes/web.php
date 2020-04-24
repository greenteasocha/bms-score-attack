<?php

// namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Music;
use App\Models\Contest;

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

// Route::get('/home', function () {
//     $musics = DB::select('select * from Musics', [1]);
//     Log::debug($musics);
//     Log::debug('home page!');
//     return view("home");
// });  

Route::get('/home', 'TopPageController@getTopPage');

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

Route::get('/contests/{contestId}', 'ContestPageController@aggregateRankingData');

// Route::get('/contests/{contestId}', function($contestId) { 
//     $music = ["music A", "music B", "music C"][$contestId % 3];

    
//     $basicInfo = [
//         'contestId' => $contestId,
//         'musicName' => $music,
//         'heldDate' => date('Ymd'),
//     ];
//     $rankingData = [
//         ["userId" => 1,
//         "name" =>  "user1",
//         "score" => 4000,
//         "comment" => ""],
//         ['userId' => 2,
//         "name" => "user2",
//         "score" => 3900,
//         "comment" => "good"]
//     ];

//     return view("rankings", ['basicInfo' => $basicInfo, 'rankingData' => $rankingData]);
// });

Route::post('/contests/{contestId}', 'ContestPageController@handlePostedScore');
// Route::post('/contests/{contestId}', function($contestId) {
//     Log::debug('< contest score >  POST CREATED!!!!!');
//     print('Successfully posted on contest: ' . $contestId);
// });

Route::get('/users/{userId}', 'UserPageController@aggregateUserData');

// Route::get('/users/{userId}', function($userId) {

//     $user = [
//         'userId' => $userId,
//         'userName' => 'Taro',
//     ];

//     return view('user', ['user' => $user]);
// });

Route::get('/musics', function() {
    $musics = DB::table('Musics')->get();
    print($musics);
});


// ==================== 適当なテストようリンク ===========================

Route::get('blade', function () {
    return view('child');
});

Route::get('greeting', function () {
    return view('welcome', ['name' => 'Samantha']);
});


Route::get('/elousers', function() { 
    // Eloquentモデル？の適当なverify
    // User::insert(['userName'=>'sabro', 'password'=>'hisabro']);
    $siro = User::create(['userName'=>'siro', 'password'=>'hisiro']);
    $user = User::all();
    return $user;
});

Route::get('/ormtest', function(){
    // 適当にEloquentリレーションの挙動を確かめる
    // 今、レコードを何回も削除したり追加したりしたせいでレコードの連番IDが24とかから始まっているので危険
    $musicId = 24;
    $contest = optional(
        Music::find($musicId)->contest);
    return $contest->contestId . $contest->holdedDate;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
