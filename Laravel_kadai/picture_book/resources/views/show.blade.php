<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>図鑑アプリ : 動物詳細</title>
</head>
<body>
    <h1>動物詳細</h1>
    <h2>{{ $animal->name }}</h2>
    <p>説明 : {{ $animal->description }}</p>
    <p>画像ファイル名 : {{ $animal->image }}</p>

    <img src="/{{ $animal->image }}" alt="{{ $animal->name }}" width = 100>
    
    <p><a href="/">動物一覧へ戻る</a></p>
</body>
</html>