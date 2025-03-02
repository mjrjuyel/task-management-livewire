<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){
     Route::get('/user_list',[ChatController::class,'index'])->name('user_list');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
