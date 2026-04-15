<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->runningOnVercel()) {
            $this->configureForVercel();
        }
    }

    private function runningOnVercel(): bool
    {
        if (getenv('VERCEL')) {
            return true;
        }

        return str_starts_with((string) $this->app->basePath(), '/var/task');
    }

    private function configureForVercel(): void
    {
        $compiled = '/tmp/laravel-views';
        if (! is_dir($compiled)) {
            @mkdir($compiled, 0775, true);
        }

        config([
            'view.compiled' => $compiled,
            'session.driver' => 'cookie',
            'cache.default' => 'array',
            'logging.default' => 'stderr',
        ]);

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
