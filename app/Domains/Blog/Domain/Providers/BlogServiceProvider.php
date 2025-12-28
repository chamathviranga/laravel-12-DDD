<?php

namespace App\Domains\Blog\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domains\Blog\Domain\Ports\CategoryRepository;
use App\Domains\Blog\Adapters\EloquentCategoryRepository;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services and bindings.
     */
    public function register(): void
    {
        // Bind the port to the adapter
        $this->app->bind(
            CategoryRepository::class,
            EloquentCategoryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
