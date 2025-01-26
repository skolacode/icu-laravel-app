<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

Route::middleware(['auth', 'log-request'])->group(function() {
  Route::get('/tags', [TagController::class, 'index'])->name('tags');
});
