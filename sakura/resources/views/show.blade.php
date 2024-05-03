<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>書籍詳細</h1>
    <h2>{{ $book->title }}</h2>
    <p>著者 : {{ $book->author }}</p>
    <p>出版日 : {{ $book->published_on }}</p>

    <!-- show.blade.php -> BookContorller.edit($id) -->
    <a href="{{ route('books.edit' , $book->id) }}">編集する</a>

    <!-- show.blade.php -> BookContorller.index() -->
    <a href="/">戻る</a>

    <hr>
    <form action="{{route('books.destroy' , $book->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">削除する</button>
    </form>

</body>
</html>