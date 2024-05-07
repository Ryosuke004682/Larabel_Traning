<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LikeController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']] , function () {
    
    /*マイページ*/
    Route::get('/home' , [HomeController::class, 'index']) -> name('home');
    /*end of マイページ*/


    /*書籍のリソースルート*/
    Route::resource('books' , BookController::class);
    /*end of 書籍のリソースルート*/

    
    /*お気に入り機能*/
    Route::get('/like' , [LikeController::class , 'index'])  ->name('likes.index');
    Route::post('/like' , [LikeController::class , 'store'])  ->name('likes.store');
    Route::delete('/like' , [LikeController::class , 'destroy'])->name('likes.destroy');
    /*end of お気に入り機能*/
});
