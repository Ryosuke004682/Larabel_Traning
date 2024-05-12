<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規作成画面</title>
</head>
    <body>
        <h1>メモの新規作成</h1>
        <form action="{{ route('memos.store') }}" method="post">
            @csrf
            <dl>
                <dt>タイトル</dt>
                <dd><input type="text" name="title"></dd>
                <dt>本文</dt>
                <dd><textarea name="content"></textarea></dd>
            </dl>
            <button type="submit">登録する</button>
        </form>
        <hr>
        <a href="/">キャンセル</a>
    </body>
</html>