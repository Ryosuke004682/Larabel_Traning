<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookContorller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Topページにアクセスすると、書籍一覧ページに飛ぶ
Route::get('/' , [BookContorller::class , 'index']);

//リソースルートで書く場合
//resource(リソース名 , コントローラー名);
Route::resource('books' , BookContorller::class);

//一覧の書籍タイトルのリンクをクリックすると、その書籍の詳細ページを表示する。
//Route::get('/books/{id}' ,[ BookContorller::class  , 'show']);

