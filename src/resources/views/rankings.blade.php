
@extends('layouts.app')

@section('content')
<html>
    <body>
    <h1>HI, here is contest {{ $basicInfo["id"] }}</h1>
    @auth
        <form action={!! "/contests/" . $basicInfo["id"] !!} method="POST">
            {{-- TODO: とりあえずuserNameは手動入力にする。後々はログインしてもらってヘッダから獲得する --}}
            @csrf
            
            {{-- <label for="userId">UserId</label>
            <input name="userId" id="userId" value=""> --}}
            <input type="hidden" name="userId" id="userId" value="{{ $authInfo->id }}">

            <label for="score">score</label>
            <input name="score" id="score" value="">

            <label for="comment">comment</label>
            <input name="comment" id="comment" value="">
        
            <button>Send Score</button>

        </form>
    @endauth
        <a href="/home"> Back to home <br> </a>

        <b> Player / score / comment <br> </b>
        @foreach ($scores as $score)
            <div>    
                {{-- {{ $loop->iteation }} --}}
                <a href={!! "/users/" . $score["userId"] !!}>
                {{ $score["name"] }}
                </a>
                {{ $score["score"] }}
                {{ $score["comment"] }}
            </div>
        @endforeach
    </body>
</html>
@endsection