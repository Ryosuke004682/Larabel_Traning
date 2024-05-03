<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <body>
        <!-- edit.blade.php -> BookContorller.edit($id) -->
        <h1>書類情報の編集</h1>
        <form action="{{ route('books.update' , $book->id)}}">
            @csrf
            @method('patch')<!--部分的に更新をかける-->
            
            <dl>
                <dt>タイトル</dt>
                <dd><input type="text" name="title" value="{{ $book->title }}"></dd>
                <dt>著者</dt>
                <dd><input type="text" name="author" value="{{ $book->author }}"></dd>
                <dt>出版日</dt>
                <dd><input type="date" name="published_on" value="{{ $book->published_on }}"></dd>
            </dl>
            <button type="submit">更新する</button>
        </form>
        <hr>
        <a href="/">戻る</a>
    </body>
</html>