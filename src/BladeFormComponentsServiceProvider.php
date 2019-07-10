<?php

namespace SoareCostin\BladeFormComponents;

use Illuminate\Support\Facades\Blade;
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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-form-components');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('blade-form-components.php'),
            ], 'config');
        }

        Blade::directive(
            'form',
            $this->app->make(CompileFormDirective::class)
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blade-form-components');

        $this->app->singleton(Form::class, function () {
            return new Form();
        });
    }
}
