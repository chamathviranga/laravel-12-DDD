<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Blog\Domain\Controllers\BlogController;

// Get all categories from categories domain
Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index']);

    // Load categories via the Blogs domain.
    // Categories are not accessed directly from this domain, as that would violate domain boundaries.
    // This follows the Ports and Adapters pattern, preserving domain isolation and enabling
    // independent deployment in the future.
    
    Route::get('/categories', [BlogController::class, 'categories']);

});
