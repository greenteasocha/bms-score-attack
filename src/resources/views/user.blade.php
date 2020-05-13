@extends('layouts.app')

@section('content')

<html>
    <body>
        <h1>HI, here is User {{ $basicInfo["userName"] }}</h1>

        <a href="/home"> Back to home <br> </a>
        <table class="usertable">
            <tr class="header-row">
                <td><b> Date </b></td><td> <b>theme </b></td> <td><b>score </b></td>
            </tr>

            @foreach ($scores as $score)
                <tr>
                    <td>
                        <a href={!! "/contests/" . $score["contestId"] !!}>
                        {{ $score["eventDate"] }}
                        </a>
                    </td>
                    <td> {{ $score["musicName"] }} </td>
                    <td> {{ $score["score"] }} </td>
                </tr>  
            @endforeach
        </table>
    </body>
</html>

@endsection