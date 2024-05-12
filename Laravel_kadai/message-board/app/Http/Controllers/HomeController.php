<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //ホームページ
        $messages = \Auth::user()->messages()->orderBy('created_at', 'desc')->paginate();
        return view('home.index', ['messages' => $messages]);
    }
}
