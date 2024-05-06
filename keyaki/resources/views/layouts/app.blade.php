<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <header>
        <div class="container">
            <!--config関数 : 設定ファイルに記述された内容を受け取ることができる。-->
            <!--config(設定ファイルの名前 , 設定項目のキー)　、今回はapp.nameという設定ファイルを指定-->
            <!--app.nameは、「config/app.php」の「'name' => env('APP_NAME', 'Laravel')」を参照。-->
            <a class="brand" href="/">{{ config('app.name') }}</a>
            @include('commons.nav')
        </div>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>