<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 自分の蔵書一覧
        //FIXME : 下記のコードでユーザーが認知しない原因不明のバグが発生
        $books = \Auth::user()->books()->orderBy('created_at','desc')->paginate(20);
        return view('home.index', ['books' => $books]);
    }
}
