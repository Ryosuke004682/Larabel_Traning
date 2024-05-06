@extends('layouts.app')

@section('content')
<h1>書籍情報</h1>
<p>
@if($book->user_id == Auth::id)
    <a href="{{ route('books.edit' , $book) }}">編集する</a>
    |
    <a href="#" onclick="deleteBook()">削除する</a>
    <form action="{{ route('books.destroy' , $book) }}" method="post" id="delete-form">
        @csrf
        @method('delete')
    </form>
    <script type="text/javascript">
        function deleteBook() {
            event.preventDefault();
            
            if(window.confirm('ほんとに削除しますか？')) {
                document.getElementById('delete-from').submit();
            }
        }
    </script>
@else
<!--TODO:後でお気に入りボタンを設置する。-->
@endif
</p>
<dl>
    <dt>タイトル</dt>
    <dd>{{ $book->title }}</dd>
    <dt>著者</dt>
    <dd>{{ $book->author }}</dd>
    <dt>出版社</dt>
    <dd>{{ $book->publisher }}</dd>
    <dt>投稿者</dt>
    <dd>{{ $book->user->name }}</dd>
    <dt>感想文</dt>
    <dd>{!! nl2br(e($book->review)) !!}</dd>
</dl>
@endsection