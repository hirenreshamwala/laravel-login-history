<?php

namespace Xt\LoginHistory;

use Illuminate\Support\ServiceProvider;

class LoginHistoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        if ($this->shouldMigrate()) {
            $this->loadMigrationsFrom([dirname(__DIR__) . '/database']);
        }

        if (function_exists('config_path')) {
            $this->publishes([
                dirname(__DIR__) . '/config/config.php' => config_path('login-history.php'),
            ], 'laravel-login-history-config');
        }

        $this->publishes([
            dirname(__DIR__) . '/database/' => database_path('migrations'),
        ], 'laravel-login-history-migrations');

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'login-history');

        // Register the main class to use with the facade
        $this->app->singleton('login-history', function () {
            return new LoginHistory;
        });
    }

    /**
     * Determine if we should register the migrations.
     */
    private function shouldMigrate(): bool
    {
        return LoginHistoryConfigure::isRunsMigrations();
    }
}
