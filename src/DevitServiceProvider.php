<?php

namespace Naykel\Devit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DevitServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/devit.php', 'devit');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'devit');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/devit.php' => config_path('devit.php'),
            ], 'devit-config');
        }

        Blade::anonymousComponentNamespace(__DIR__ . '/../resources/views/components', 'devit');
    }
}
