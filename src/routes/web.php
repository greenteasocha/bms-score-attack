<?php

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
    Log::debug('home page!');
    return view("home");
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
