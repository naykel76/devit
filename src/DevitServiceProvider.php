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
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'devit');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        Blade::anonymousComponentNamespace(__DIR__ . '/../resources/views/components', 'devit');
    }
}
