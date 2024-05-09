<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/' , [ProductController::class , 'index'])->name('top');
Route::resource('products' , ProductController::class);//リソースルートを定義
