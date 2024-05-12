<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        //動物の一覧ページ
        $animals = \App\Models\Animal::all();

        //indexというファイルのビューを探しだして、そこに書かれたHTMLドキュメントをレスポンスとして返す。
        //その際に、$animalsデータをHTMLドキュメントに埋め込んでいる。
        return view('index' , ['animals' => $animals]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //動物の詳細ページ
        $animal = \App\Models\Animal::find($id);

        //showというファイルのビューを探しだして、そこに書かれたHTMLドキュメントをレスポンスとして返す。
        //その際に、$animalデータをHTMLドキュメントに埋め込んでいる。
        return view('show' , ['animal' => $animal]);
    }

    public function edit(Animal $animal)
    {
        //
    }

    public function update(Request $request, Animal $animal)
    {
        //
    }

    public function destroy(Animal $animal)
    {
        //
    }
}
