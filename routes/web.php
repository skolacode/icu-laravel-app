<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

require __DIR__.'/feed/web.php';
require __DIR__.'/tag/web.php';

Route::middleware('guest')->group(function () {
    Route::get('/auth/signup', [AuthController::class, 'signUp'])->name('auth.signup');
    Route::get('/auth/signin', [AuthController::class, 'signIn'])->name('auth.signin');

    Route::post('/auth/storeUser', [AuthController::class, 'storeUser'])->name('auth.storeUser');
    Route::post('/auth/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::get('/auth/signout', [AuthController::class, 'signOut'])->name('auth.signout');
Route::get('/ai/feed', [AIController::class, 'generateFeedContent'])->name('ai.feed');

// Custom Fall back route
Route::fallback(function () {
    return 'NO page found :(';
});
