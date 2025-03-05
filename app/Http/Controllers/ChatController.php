<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    public function index(){
        $users = User::where('id','!=',auth()->user()->id)->get();
        // return $users;
        return view('chat.chatlist',compact('users'));
    }

    public function chat($id){
        $chat = User::findOrFail($id);
        // return $chat;
        return  view('chat.chat',compact('chat'));
    }
}
