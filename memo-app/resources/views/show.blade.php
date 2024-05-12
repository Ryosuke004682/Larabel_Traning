<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>メモ詳細</title>
</head>
<body>
    <h1>メモ詳細</h1>
    <h2>{{ $memo->title }}</h2>
    <p> {{ $memo->content }} </p>
    <p>作成日時 : {{$memo->created_at}}</p>
    <a href="{{ route('memos.edit' , $memo->id) }}">編集する</a>
    <a href="{{ route('memos.index') }}">メモ一覧へ</a>
    <hr>
    <form action="{{ route('memos.destroy' , $memo->id) }}" method='post'>
        @csrf
        @method('delete')
        <button type="submit">削除する</button>
    </form>
    <p><a href="{{ route('memos.confirm-delete' , $memo->id) }}">削除確認</a></p>
</body>
</html>