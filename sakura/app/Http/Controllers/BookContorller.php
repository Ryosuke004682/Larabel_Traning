<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookContorller extends Controller
{
    public function index()
    {
        //リソース一覧を表示するためのメソッド

        //DBに登録されている書籍データをall()メソッドを使って取得
        $books = \App\Models\Book::all();

        //view() : view(フォルダ名 , ファイル名);
        //indexファイルを参照して、HTMLドキュメントを返す。
        return view('index' , ['books' => $books]);
    }

    public function create()
    {
        //リソースの作成フォームを表示するメソッド
    }

    public function store(Request $request)
    {
        //リソースの作成処理を行うメソッド

        //create.blade.phpから返ってきた値を設定
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_on = $request->published_on;
        $book->save();

        //リダイレクト先は「書籍一覧ページ」
        return redirect(route('books.index'));
    }


    public function show($id)
    {
        //特定のリソースを表示するためのメソッド

        //URLに含まれたIDの値を取得して、該当するidを取得
        $book = \App\Models\Book::find($id);

        //showファイルを参照し、HTMLドキュメントを返す
        return view('show' , ['book' => $book]);
    }

    public function edit($id)
    {
        //リソースのフォームを編集フォームを表示するためのメソッド
        $book = \App\Models\Book::find($id);
        return view('edit' , ['book' => $book]);
    }


    public function update(Request $request, $id)
    {
        //リソースの更新処理を行うメソッド

        //edit.blade.phpから返ってきた値を設定
        $book = \App\Models\Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_on = $request->published_on;
        $book->save();

        //リダイレクト先は、「詳細画面」
        return redirect(route('books.show' , $book->id));
    }

    public function destroy($id)
    {
        //リソースの削除処理を行うメソッド

        //データの削除
        $book = \App\Models\Book::find($id);
        $book->delete();

        //リダイレクト先は、「書籍一覧ページ」
        return redirect(route('books.index'));
    }
}
