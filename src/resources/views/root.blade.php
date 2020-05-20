@extends('layouts.app')

<style>
    .logo{
    width: 60%;    
    }
</style>

@section('content')
<div class="middle">

    <div class="curvedEnclosure" align="center">
        <a href="/home"><h1>BMS Daily Score Attack</h1></a>

        <h2>使い方</h2>
        <p>毎日課題曲をやってスコアを投稿するだけ！</p>
        <p>このツールは主に自分のモチベアップのために制作されています</p>
        <p>(毎日BMSを触るのが難しい、今日の課題曲には手を出せないという場合を考慮して、</p>
        <p>過去一週間分の課題曲にはスコアを投稿できるようになっています)</p>
        <br>
        <br>
        <h2>注意点</h2>
        <p>このサイトは開発途中です(テストプレイ的なものだと思ってください...)。</p>
        <p>安定版になるまでは予告なくデータなどが削除されることがあります。</p>
        <p>ユーザー名やコメントに不適切な言葉をあんまり使わないでください</p>
        <p>バグや要望がありましたら<a href="https://twitter.com/sentya7">sentya7</a>までお知らせください。<br></p>
        <p>特になければ「めちゃくちゃ良いです」とだけお伝えください</p>
        <br>
        <br>
        <h2>登録・ログイン・投稿</h2>
        右上の「register」からユーザー登録をするとスコアが投稿できるようになります。 <br>
        <br>
        <img class="logo" src="image/root.png" alt="logo"> <br> <br>
        必要情報を入力してください。メールアドレスはアットが入っていればなんでもいいです。<br>
        ただし、<font color=red>開発途中のためパスワード復元などの仕組みがありません。</font> <br>
        新しくアカウントを作り直すことになります(すみません) <br><br>
        <img class="logo" src="image/register.png" alt="logo"> <br><br>
        初回登録時は自動でログインされます。<br><br>
        <img class="logo" src="image/login.png" alt="logo"> <br><br>
        ログイン状態でランキングページに入ると投稿フォームが表示されます。<br><br>
        <img class="logo" src="image/post.png" alt="logo"> <br> 
    </div>

</div>
@endsection