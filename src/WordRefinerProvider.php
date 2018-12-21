<?php

namespace WordRefiner;

use Illuminate\Support\ServiceProvider;

class WordRefinerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__ . '/http/helpers.php';
        require_once __DIR__ . '/config/refiner.php';
        $this->publishes([
            __DIR__.'/config/refiner.php' => config_path('refiner.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
