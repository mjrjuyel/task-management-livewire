<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/user', function (Request $request) {
    $users = User::all();

    return response()->json([
        'status'=>true,
        'message'=>'User Fetch Succesfully',
        'data'=>$users,
    ],200);
})->middleware('auth:sanctum');

Route::post('/login',function(Request $request){

    $creadential = $request->only('email','password');

    if(Auth::attempt($creadential)){
        $user = Auth::user();
        $token = $user->CreateToken('myApp')->plainTextToken;
        return response()->json([
            'status'=>true,
        'message'=>'User Fetch Succesfully',
        'token'=>$token,
        'data'=>$user,
    ],200);
    }
});