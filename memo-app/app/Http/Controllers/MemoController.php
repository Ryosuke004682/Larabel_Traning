<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index()
    {
        $memos = \App\Models\Memo::all();
        return view('index' , ['memos' => $memos]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $memo = new \App\Models\Memo;
        $memo->title   = $request->title;
        $memo->content = $request->content;
        $memo->save();
        return redirect(route('memos.index'));
    }

    public function show($id)
    {
        $memo = \App\Models\Memo::find($id);
        return view('show' , ['memo' => $memo]);

    }

    public function edit($id)
    {
        $memo =  \App\Models\Memo::find($id);
        return view('edit' , ['memo' => $memo]);
    }

    public function update(Request $request, $id)
    {
        $memo = \App\Models\Memo::find($id);
        $memo->title = $request->title;
        $memo->content = $request->content;
        $memo->save();
        return redirect(route('memos.show' , $memo->id));
    }

    public function destroy($id)
    {
        $memo = \App\Models\Memo::find($id);
        $memo->delete();
        return redirect(route('memos.index'));
    }

    public function confirmDelete($id) {
        $memo = \App\Models\Memo::find($id);
        return view('destroy' , ['memo' => $memo]);
    }
}
