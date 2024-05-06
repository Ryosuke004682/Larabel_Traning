<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']] , function () {
    Route::get('/home' , [HomeController::class, 'index']) -> name('home');
    Route::resource('books' , BookController::class);
});
