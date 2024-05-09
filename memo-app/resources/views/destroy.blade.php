<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>削除確認画面</title>
</head>
<body>
    <h1>メモ削除確認</h1>
    <h2>タイトル : {{ $memo->title }}</h2>
    <p>このメモをほんとに削除しますか？</p>
    <form action="{{ route('memos.destroy' , $memo->id) }}" method="post">[
        @csrf
        @method('delete')
        <button type="submit">削除する</button>
    </form>
    <hr>
    <a href="{{ route('method.show' , $memo->id) }}">キャンセル</a>
</body>
</html>