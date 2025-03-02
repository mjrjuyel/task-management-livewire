<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    public function index(){
        $users = User::all();
        // return $users;
        return view('chat.chatlist',compact('users'));
    }
}
