<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemoController extends Controller
{
    public function index()
    {
        //メモ一覧
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
        $memo = \App\Models\Memo::find($id);
        return view('edit' , ['memo' => $memo]);
    }

    public function update(Request $request, $id)
    {
        $memo = \App\Models\Memo::find($id);
        $memo->title   = $request->title;
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

    //削除確認用
    public function confirmDelete($id) {
        $memo = \App\Models\Memo::find($id);
        return view('confirm-delete' , ['memo' => $memo]);
    }
}
