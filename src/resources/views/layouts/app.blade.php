<!-- resources/views/layouts/app.blade.phpとして保存 -->

<html>
    <head>
        <title>アプリ名 - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            ここがメインのサイドバー
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>