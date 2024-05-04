@extends('layouts.app')

@section('content')
<h1>会員登録</h1>
@include('commons.flash')
    <form action="{{ route('register') }}" method="post">
        <!--@csrf : こいつ書かないとセキュリティ喚起エラーの419が出る。-->
        @csrf
        <p>
            <label>名前</label>
            <!--old関数 : 直前の入力内容を取得できる-->
            <!--入力漏れがあった場合に、再入力させられるけど、
            再入力で画面が戻されたとしても入力内容を保持してくれるやつ。これ無いとまた一から書くことになってシンプルにだるい-->
            <input type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </p>

        <p>
            <label>パスワード</label>
            <input type="password" name="password" value="">
        </p>

        <p>
            <label>パスワード確認</label>
            <input type="password" name="password_confirmation" value="">
        </p>

        <p>
            <button type="submit">会員登録</button>
        </p>
        
        <p>または</p>
        <p>
            <a href="{{ route('login') }}">ログイン</a>
        </p>
    </form>
@endsection