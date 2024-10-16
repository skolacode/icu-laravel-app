<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;

Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');

Route::get('/feed/create', [FeedController::class, 'create'])->name('feed.create');
Route::post('/feed/store', [FeedController::class, 'store'])->name('feed.store');

Route::get('/feed/show/{feed}', [FeedController::class, 'show'])->name('feed.show');
Route::put('/feed/update/{feed}', [FeedController::class, 'update'])->name('feed.update');

// STEPS
// VIEW > Controller > Route
