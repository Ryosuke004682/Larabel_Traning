@extends('layouts.app')

@section('content')
<h1>書籍情報編集</h1>
@include('commpns.flash')
<form action="{{ route('books.update' , $book->id) }}" method="post">
    @method('patch')
    @include('books.from')
    <button type="submit">更新</button>
</form>
@endsection