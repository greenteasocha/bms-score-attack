<html>
    <body>
        <h1>HI</h1>

        <form action="/contests" method="POST">
            {{-- TODO: とりあえずuserNameは手動入力にする。後々はログインしてもらってヘッダから獲得する --}}
            @csrf
            
            <label for="userName">UserName</label>
            <input name="userName" id="userName" value="">

            <label for="score">score</label>
            <input name="score" id="score" value="">

            <label for="comment">comment</label>
            <input name="comment" id="comment" value="">
        
            <button>Send Score</button>

        </form>

        <a href="/home"> Back to home <br> </a>

        <b> Player / score / comment <br> </b>

        @foreach ($rankingData as $ranking)
            <div>    
                {{-- {{ $loop->iteation }} --}}
                {{ $ranking["name"] }}
                {{ $ranking["score"] }}
                {{ $ranking["comment"] }}
            </div>
        @endforeach
    </body>
</html>