<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Named Route
Route::get('/user/profile', function () {
    return 'Pengguna Profiles';
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
