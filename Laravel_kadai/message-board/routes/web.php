<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

//認証ミドルウェアを適用
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('messages', MessageController::class);

    //イイネ登録・解除
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes', [LikeController::class, 'destroy'])->name('likes.destroy');
});