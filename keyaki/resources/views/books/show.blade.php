@extends('layouts.app')


@section('content')
<h1>書籍情報</h1>
<p>
@if($book->user_id == Auth::id())
    <a href="{{ route('books.edit' , $book) }}">編集する</a>
    |
    <a href="" onclick="deleteBook()">削除する</a>
    <form action="{{ route('books.destroy' , $book) }}" method="post" id='delete-form'>
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
    <!--お気に入り登録の条件分岐-->
    @if(Auth::user()->isLike($book->id))
        <form action="{{ route('likes.destroy') }}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <button type="submit">お気に入り解除</button>
        </form>
    @else
    <form action="{{ route('likes.store') }}" method="post">
        @csrf
        <input type="hidden" names="book_id" value = "{{ $book->id }}">
        <button type="submit">お気に入り登録</button>
    </form>
    @endif
    <!--end of お気に入り登録の条件分岐-->
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