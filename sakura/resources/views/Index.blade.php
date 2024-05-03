<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>書籍一覧</h1>
    @foreach($books as $book)
        <p>
            <a href="{{ route('books.show', $book->id) }}">
                {{ $book->title }}
            </a>
        </p>
    @endforeach
</body>
</html>