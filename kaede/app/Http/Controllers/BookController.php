<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //書籍情報をモデルから取得して、ビューへ渡す。
        $books = \App\Models\Book::all();

        //描画先は「index」
        return view('index' , ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //新規作成画面の描画
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //新規作成画面からPOST送信された内容を、書籍データとして登録できるようにしていく。
        $book = new \App\Models\Book;
        $book->title  = $request->title;
        $book->author = $request->author;
        $book->published_on = $request->published_on;
        $book->save();

        //保存後の処理は書式一覧ページに遷移させる。
        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //書籍情報をモデルから取得して、ビューへ渡す。
        $book = \App\Models\Book::find($id);

        //描画先は「show」
        return view('show' , ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //書籍情報をモデルから取得して、ビューへ渡す。
        $book = \App\Models\Book::find($id);

        //描画先は「edit」
        return view('edit' , ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = \App\Models\Book::find($id);
        $book->title  = $request->title;
        $book->author = $request->author;
        $book->published_on = $request->published_on;
        $book->save();

        //保存後の処理は詳細画面ページに遷移させる。
        return redirect(route('books.show' , $book->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = \App\Models\Book::find($id);
        $book->delete();

        //削除後は、書籍一覧ページに飛ばす。
        return redirect(route('books.index'));

    }
}
