
@extends('layouts.app')

@section('content')
<html>
    <body>
    <h1>HI, here is Ranking {{ $basicInfo["eventDate"] }}</h1>
    <h1>Theme:  {{ $basicInfo["musicName"] }}</h1>

    @auth
        <form action={!! "/contests/" . $basicInfo["contestId"] !!} method="POST">
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
        <table class="rankingtable">
            <tr class="header-row">
                <td><b> Player </b></td><td> <b>score </b></td> <td><b>comment </b></td>
            </tr>
            @foreach ($scores as $score)
                <tr>    
                    <td>
                        {{-- {{ $loop->iteation }} --}}
                        <a href={!! "/users/" . $score["userId"] !!}>
                            {{ $score["name"] }}
                        </a>
                    </td>
                    <td>
                        {{ $score["score"] }}
                    </td>
                    <td>
                        {{ $score["comment"] }}
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
@endsection