<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Category\Domain\Controllers\CategoryController;

// Get all categories from categories domain
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
});