<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        //web.phpでuseキーワードしているため、いちいちパスを書かなくても、「orderBy()」で書ける。
        //Bookモデルにアクセスして、created_atを降順で全件取得。
        
        //FIXME : 下記のコードでユーザーIDが認知しない原因不明のバグが発生
        $books = Book::where('user_id' , '<>' , \Auth::id())->orderBy('created_at' , 'desc')->paginate(20);
        return view('books.index' , ['books' => $books]);

        //orderBy(対象カラム , ソート順) : ソートしてくれるやつ
        //get() : モデルの検索対象レコードをコレクション型として取得 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //空の書籍インスタンスを作成
        $book = new Book;
        return view('books.create' , ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //書籍登録(登録時のバリデーション)

        //validate(リクエスト , 検証ルールの連想配列)
        $this->validate($request , [
            'title'     => 'required|max : 100',
            'author'    => 'max : 100',
            'publisher' => 'max : 100'
        ]);
        $book = $request->user()->books()->create($request->all());
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //詳細画面のアクション
        return view('books.show' , ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //編集画面のアクション
        $this->authorize($book);
        return view('books.edit' , ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        //書籍データを更新
        $this->authorize($book);
        $this->validate($request , [
            'title' => 'required|max : 100',
            'author' => 'max : 100',
            'published' => 'max : 100'
        ]);
        $book->update($request->all());
        //詳細ページへ遷移
        return redirect(route('books.show' , $book));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize($book);
        $book->delete();
        return redirect(route('home'));
    }
}
