<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>図鑑アプリ : 動物一覧</title>
</head>
<body>
    <!-- 参照スクリプト -->
    <!--AnimalController.index-->
    <!------------------->

    <h1>動物一覧</h1>
        @foreach($animals as $animal)
            <p><a href="/animals/{{ $animal->id }}">{{ $animal->name }}</a></p>
        @endforeach
</body>
</html>