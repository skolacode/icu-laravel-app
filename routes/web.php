<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Param
Route::get('/user/{name}', function ($name) {
    return 'User '.$name;
});

// Named Route
Route::get('/user/profile', function () {
    return 'User Profile';
})->name('user.profile');

// Redirect route to named route
Route::get('/redirect-to-profile', function () {
    return redirect()->route('user.profile');
});

// Route Group
Route::prefix('food')->group(function () {
    Route::get('{name}', function ($name) {
        return 'Food name: '.$name;
    });
    Route::get('details', function () {
        return 'Food details are following';
    });
});


// combination of all above (Route, Named Route, Route Param, Route Group, Route Prefix)
Route::name('.job')->prefix('job')->group(function () {
    Route::get('{name}', function ($name) {
        return 'Job name: '.$name;
    })->name('.name');
    Route::get('description', function () {
        return 'Job description are following';
    })->name('.description');
});

// Custom Fall back route
Route::fallback(function () {
    return 'NO page found :(';
});
