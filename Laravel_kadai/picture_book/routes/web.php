<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

/*各ルートを設定*/
//一覧ページ
Route::get('/' , [AnimalController::class , 'index']);

//詳細ページ
Route::get('/animals/{id}' , [AnimalController::class , 'show']);