<?php

namespace Naykel\Devit;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class DevitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'devit');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        Blade::component('devit::components.dev-toolbar', 'dev-toolbar');
    }
}
