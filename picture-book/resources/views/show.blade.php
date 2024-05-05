<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>図鑑アプリ</title>
</head>
<body>
    <h1>書籍詳細</h1>
    <h2>{{ $animal->name }}</h2>
    <p>説明 : {{ $animal->description }}</p>
    <p>画像ファイル名 : {{ $animal->image }}</p>
    <p><img src="/{{ $animal->image }}" alt="{{ $animal->name }}"></p>
    <a href="/">戻る</a>
</body>
</html>