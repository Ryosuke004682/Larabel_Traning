<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>メモ帳アプリ</title>
</head>
<body>
    <h1>メモの編集</h1>
    <form action="{{ route('memos.update' , $memo->id) }}" method="post">
        @csrf
        @method('patch')
        <dt>タイトル</dt>
        <dd><input type="text" name="title" value="{{ $memo->title }}"></dd>

        <dt>本文</dt>
        <dd><textarea name="content">{{ $memo->content }}</textarea></dd>

        <p><button type='submit'>更新する</button></p>
        <hr>
        <a href="{{ route('memos.show' , $memo->id) }}">キャンセル</a>
    </form>
</body>
</html>