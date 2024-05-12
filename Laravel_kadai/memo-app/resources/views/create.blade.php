<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>メモ帳アプリ : 新規作成</title>
</head>
    <body>
        <!--参照クラス-->
        <!--index.blade.php -> create.blade.php-->
        <h1>メモの新規作成</h1>
        <form action="{{ route('memos.store') }}" method="post">
            @csrf
            <dl>
                <dt>タイトル</dt>
                <dd><input type="text" name="title"></dd>
                <dt>本文</dt>
                <dd><textarea name="content" rows=4></textarea></dd>
            </dl>
            <button type="submit">登録する</button>
        </form>
        <hr>
        <a href="{{ route('memos.index') }}">キャンセル</a>
    </body>
</html>