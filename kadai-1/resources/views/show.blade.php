<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>神様詳細</h1>
    <h2>{{ $sample->name }}</h2>
    <p>説明 : {{ $sample->description }}</p>
    <p>画像ファイル名 : {{ $sample->image }}</p>
    <img src="/corgi.png">
    <p><a href="/">戻る</a></p>
</body>
</html>