<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;

Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');

Route::post('/feed/create', [FeedController::class, 'create'])->name('feed.create');

Route::put('/feed/update/{feed}', [FeedController::class, 'update'])->name('feed.update');

Route::get('/feed/show/{feed}', [FeedController::class, 'show'])->name('feed.show');

// STEPS
// VIEW > Controller > Route
