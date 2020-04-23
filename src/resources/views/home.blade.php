<html>
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        {{-- <h1>
            <a href="/users/1"> Hello, USER1<br> </a>
            @php
            $val = 10;
            $fruit = ['apple', 'orange'];
            @endphp

            {{ $val % 2 === 0 ? '偶数' : '奇数' }}
            <br>
            @if ($val === 10)
            10です。
            @else
            10ではないです。
            @endif
            <br>
            @foreach($fruit as $index => $name)
            {{ "{$index}: {$name}" }}
            @endforeach
            <br>

        </h1> --}}
        <h1>
            Top Page
        </h1>
        @php
            $contestId = (string) $contest->id;
            $url = "/contests/" . $contestId 
        @endphp
        <h2>
            {{-- <a href={!! "/contests/" . date("Ymd") !!}> Today's contest </a> --}}
            <a href={{ $url }}> Today's contest </a>
        </h2>

        ↓Blade のテスト <br>

        @php
            print(date("Ymd"))   
        @endphp
        <form method="post" action="/home" >
            @csrf
            
            
            <label for="to">Who to?</label>
            <input name="to" id="to" value="Mom">
        
            <button>Send my greetings</button>
            
        </form>

        <form method="POST" action="/home">
            @csrf

            <h2>form 2</h2>
            <button>Send my greetings</button>
        </form>
    </body>
</html>
