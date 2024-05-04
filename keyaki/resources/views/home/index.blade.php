@extends('layouts.app')

@section('content')
<form action="{{ route('logout') }}" method="post">
    @csrf
    <input type="submit" value="ログアウト">
</form>
@endsection