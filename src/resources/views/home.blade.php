@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BMS Daily Score Attack</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title-logo {
                font-size: 42px;
            }

            .title {
                font-size: 63px;
            }
            .pastContests {
                font-size: 20px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        {{-- <h1>
            @auth
            Hello.　{{ $authInfo->userName }}
            @endauth
            @guest
            Hello. GUEST
            @endguest
        </h1> --}}
        <div class="flex-center position-ref">
            @section('content')
                <div class="content">
                    <div class="title-logo">
                        BMS Daily Score Attack
                    </div>
                    <div class="title m-b-md">
                        Today's Theme ({{ $todaysContest["eventDate"] }}) <br>
                        <a href={!! "/contests/" . $todaysContest["id"] !!}>
                        {{ $todaysContest['musicName'] }}
                        </a>
                    </div>

                    <div class="pastContests">
                        {{-- 過去一週間のコンテストを小さく表示 --}}
                        Recent Rankings <br>
                        (過去1週間のランキングにはスコアを登録することができます)
                        @foreach ($pastSixContests as $pastContest)
                            <div>
                                {{-- {{ $loop->iteation }} --}}
                                {{ $pastContest["eventDate"] }}
                                <a href={!! "/contests/" . $pastContest["id"] !!}>
                                    {{ $pastContest["musicName"] }}
                                </a>                    
                            </div>
                        @endforeach
                    </div>
                </div>
            @endsection
        </div>
    </body>
</html>
