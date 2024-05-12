<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>メモ帳アプリ : メモ編集</title>
</head>
<body>
    <h1>メモの編集</h1>
    <form action="{{ route('memos.update' , $memo->id) }}" method="post">
        @csrf
        @method('patch')
        <dl>
            <dt>タイトル</dt>
            <dd><input type="text" name="title" value="{{ $memo->title }}"></dd>
            <dt>本文</dt>
            <dd><textarea name="content" rows="4">{{ $memo->content }}</textarea></dd>
        </dl>
        <button type="submit">更新する</button>
    </form>
    <hr>
    <a href="{{ route('memos.show' , $memo->id) }}">キャンセル</a>
</body>
</html>