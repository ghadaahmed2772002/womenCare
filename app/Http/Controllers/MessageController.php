<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('users')->get();
        return view('dashboard.messages.index', compact('messages'));
    }

    public function create()
    {
        $users = User::all();
        return view('dashboard.messages.create', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);
        Message::create([
            'user_id' => $request->user_id,
        'content' => $request->content,
        ]);
        return redirect()->route('messages.index');


    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('dashboard.messages.show', compact('message'));
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $users = User::all();
        return view('dasboard.messages.edit', compact('message', 'users'));
    }

    public function update(Request $request,$id)
    {
        $message=Message::findOrFail($id);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $message->update($request->all());

        return redirect()->route('messages.index');
    }
    public function destroy($id){
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('messages.index');

    }
}
