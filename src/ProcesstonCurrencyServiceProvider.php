<?php

namespace Processton\ProcesstonCurrency;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ProcesstonCurrencyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'processton-currency');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'processton-currency');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->registerRoutes();
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('module-currency.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/processton-currency'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/processton-currency'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/processton-currency'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'module-currency');

        // Register the main class to use with the facade
        $this->app->singleton('processton-currency', function () {
            return new ProcesstonCurrency;
        });
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/routes.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('module-currency.base_path'),
            'middleware' => [
                ...(config('processton-client.middleware') ? config('processton-client.middleware') : []),
                ...(config('module-currency.middleware') ? config('module-currency.middleware') : [])
            ],
        ];
    }
}
