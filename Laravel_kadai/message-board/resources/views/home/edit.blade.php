@extends('layouts.app')

@section('content')
<h1>プロフィール編集</h1>
@include('commons.flash')
<form action="{{ route('profile.update') }}" method="post">
    @csrf
    @method('patch')
    <label>名前</label><br>
    <!--$user->name は、現在のユーザーの名前を表示-->
    <input type="text" name='newUserName' value="{{ $user->name }}">
    <p>
        <button type="submit">更新する</button>
    </p>
</form>
@endsection