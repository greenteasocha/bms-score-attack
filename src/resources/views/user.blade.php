@extends('layouts.app')

@section('content')

<html>
    <body>
        <h1>HI, here is User {{ $basicInfo["userName"] }}</h1>

        <a href="/home"> Back to home <br> </a>

        <b> Date / Theme song / score <br> </b>

        @foreach ($scores as $score)
            <div>    
                {{-- {{ $loop->iteation }} --}}
                <a href={!! "/contests/" . $score["contestId"] !!}>
                {{ $score["eventDate"] }}
                </a>
                {{ $score["musicName"] }}
                {{ $score["score"] }}
            </div>
        @endforeach
    </body>
</html>

@endsection