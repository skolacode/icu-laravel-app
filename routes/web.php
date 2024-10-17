<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/home/{name}', function ($name) {
    return view('home', [ 'name' => $name ]);
});

Route::get('/about', function () {
    return view('about');
})->name('about');

// Named Route
Route::post('/user', function () {
    return 'Pengguna Profile Baru';
})->name('user.profile');


// Route Param
Route::get('/user/{name}', function ($name) {
    return 'User '.$name;
});


// alias of a route user.profile = /pengguna/profile

// Redirect route to named route
Route::get('/redirect-to-profile', function () {
    return redirect()->route('user.profile');
});

// Route Group
Route::prefix('food')->group(function () {

    Route::get('/details', function () {
        return 'Food details are following';
    });

    Route::get('/home', function () {
        return 'Food home page';
    });

});


// combination of all above (Route, Named Route, Route Param, Route Group, Route Prefix)
Route::name('job')->prefix('job')->group(function () {
    
    Route::get('home', function () {
        return 'Job home page';
    })->name('.home');
    
    Route::get('details', function () {
        return 'Job details are following';
    })->name('.description');

});

// Custom Fall back route
Route::fallback(function () {
    return 'NO page found :(';
});

require __DIR__.'/feed/web.php';

Route::middleware('guest')->group(function () {
    Route::get('/auth/signup', [AuthController::class, 'signUp'])->name('auth.signup');
    Route::get('/auth/signin', [AuthController::class, 'signIn'])->name('auth.signin');

    Route::post('/auth/storeUser', [AuthController::class, 'storeUser'])->name('auth.storeUser');
    Route::post('/auth/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::get('/auth/signout', [AuthController::class, 'signOut'])->name('auth.signout');
Route::get('/ai/feed', [AIController::class, 'generateFeedContent'])->name('ai.feed');
