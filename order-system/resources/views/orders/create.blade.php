@extends('layouts.app')

@section('content')
<h1>注文登録</h1>
@include('commons.flash')
<form action="{{ route('orders.store') }}" method="post">
    @csrf 
    @include('orders.form')
    <button type="submit">登録する</button>
</form>

@endsection