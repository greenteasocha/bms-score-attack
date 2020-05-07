<?php

// namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Music;
use App\Models\Contest;
use Illuminate\Support\Facades\Auth;

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
    $authInfo = Auth::user();
    return view('welcome', ['authInfo' => $authInfo]);
});

Route::get('/home', 'TopPageController@getTopPage');

Route::get('/mypage', function(){
    if (Auth::check()) {
        return redirect('/users/' . Auth::id());
    } else {
        // ログインしないとmyPageへのリンクが表示されない実装にはするが
        return redirect('/login');
    }
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

Route::get('/contests', 'ContestPageController@showAllContests');

Route::get('/contests/{contestId}', 'ContestPageController@aggregateRankingData');

Route::post('/contests/{contestId}', 'ContestPageController@handlePostedScore');

Route::get('/users/{userId}', 'UserPageController@aggregateUserData');

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

Route::get('auth-check', function(){
    return Auth::id();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
