<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;


Route::resource('memos' , MemoController::class);
Route::get('/memos/{id}/delete' , [MemoController::class , 'confirmDelete'])->name('memos.confirm-delete');