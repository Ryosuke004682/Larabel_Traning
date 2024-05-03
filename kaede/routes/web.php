<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\BookController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/' , [BookController::class , 'index']);
//Route::get('/books/{id}' , [BookController::class , 'show']);
Route::resource('books' , BookController::class);
