<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->discoverDomains(function ($domainPath, $domainName) {
            // 1. Auto-register Service Providers
            $providersPath = $domainPath . '/Domain/Providers';

            if (File::isDirectory($providersPath)) {
                $providerFiles = File::files($providersPath);

                foreach ($providerFiles as $file) {
                    /**
                     * Convert file path to Class Name
                     * Example: App\Domains\Blog\Domain\Providers\BlogServiceProvider
                     */
                    $className = 'App\\Domains\\' . $domainName . '\\Domain\\Providers\\' . $file->getFilenameWithoutExtension();

                    if (class_exists($className)) {
                        $this->app->register($className);
                    }
                }
            }
        });
    }

    public function boot(): void
    {
        $domainsPath = base_path('app/Domains');

        // 1. Check if the directory exists to avoid errors
        if (!File::isDirectory($domainsPath)) {
            return;
        }

        // 2. Get all subdirectories within app/Domains
        $directories = File::directories($domainsPath);

        foreach ($directories as $domainPath) {
            
            /**
             * $domainPath is the full absolute path, e.g., /var/www/app/Domains/Blog
             * 
             * 3. Auto-load Migrations
             * Path: app/Domains/{Domain}/Domain/Migrations
             */
            
            $migrationPath = $domainPath . '/Domain/Migrations';
            if (File::isDirectory($migrationPath)) {
                $this->loadMigrationsFrom($migrationPath);
            }

            /**
             * 4. Auto-load Routes
             * Path: app/Domains/{Domain}/routes.php
             */
            $routeFile = $domainPath . '/routes.php';
            if (File::exists($routeFile)) {
                Route::middleware('web')
                    ->group($routeFile);
            }
        }
    }

    /**
     * Helper to avoid repeating the directory scanning logic.
     */
    protected function discoverDomains(callable $callback): void
    {
        $domainsPath = base_path('app/Domains');

        if (!File::isDirectory($domainsPath)) {
            return;
        }

        $directories = File::directories($domainsPath);

        foreach ($directories as $path) {
            $domainName = basename($path); // e.g., "Blog"
            $callback($path, $domainName);
        }
    }
}
