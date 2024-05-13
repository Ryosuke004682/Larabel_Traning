@extends('layouts.app')

@section('content')
<h1>注文編集</h1>
@include('commons.flash')
<form action="{{ route('orders.update', $order->id) }}" method="post">
    @csrf 
    @method('patch')
    @include('orders.form')
    <button type="submit">更新する</button>
    <a href="{{ route('orders.show', $order->id) }}">キャンセル</a>
</form>

@endsection