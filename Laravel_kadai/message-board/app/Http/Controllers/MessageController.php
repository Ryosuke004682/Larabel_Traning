<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        //orderBy : メッセージの投稿時間をソートする。
        $messages = Message::orderBy("created_at","desc")->paginate(10);
        return view('messages.index', ['messages' => $messages]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //バリデーションチェック
        $this->validate($request, [
            'content' => 'required',
        ]);

        $message = $request->user()->messages()->create($request->all());
        return redirect(route('home'));
    }

    public function show(Message $message)
    {
        return view('messages.show', ['message' => $message]);
    }

    public function edit(Message $message)
    {
        $this->authorize($message);
        return view('messages.edit', ['message' => $message]);
    }

    public function update(Request $request, Message $message)
    {
        // 更新処理は投稿者本人のみアクセス許可
        $this->authorize($message);

        //本文が書かれているかどうかのバリデーションチェック
        $this->validate($request, [
            'content' => 'required',
        ]);

        $message->update($request->all());
        return redirect(route('home'));
    }

    public function destroy(Message $message)
    {
        //削除処理は本人のみアクセス可能
        $this->authorize($message);

        $message->delete();
        return redirect(route('home'));
    }
}
