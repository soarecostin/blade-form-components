<?php

namespace Soarecostin\BladeFormComponents;

use Illuminate\Support\ServiceProvider;

class BladeFormComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'blade-form-components');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-form-components');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('blade-form-components.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/blade-form-components'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/blade-form-components'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/blade-form-components'),
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
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blade-form-components');

        // Register the main class to use with the facade
        $this->app->singleton('blade-form-components', function () {
            return new BladeFormComponents;
        });
    }
}
