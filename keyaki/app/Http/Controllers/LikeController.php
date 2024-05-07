<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    //likeBooks() : お気に入り情報へアクセス

    public function index()
    {
        $books = \Auth::user()->likeBooks()->orderBy('created_at' , 'desc')->paginate(20);
        return view('likes.index' , ['books' => $books]);
    }

    //お気に入り登録機能
    public function store(Request $request)
    {
        //attachメソッドを使って、自分のお気に入り機能を登録
        \Auth::user()->likeBooks()->attach($request->book_id);
        return back();
    }

    //お気に入り解除機能
    public function destroy(Request $request)
    {
        //detachメソッドを使って、お気に入りを解除
        \Auth::user()->likeBooks()->detach($request->book_id);
        return back();
    }

    
}
