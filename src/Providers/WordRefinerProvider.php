<?php

namespace Vcian\LaravelWordRefiner\Providers;

use Illuminate\Support\ServiceProvider;

class WordRefinerProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot() : void
    {
        require_once __DIR__ .'/../../src/helpers.php';
        require_once __DIR__ . '/../../config/refiner.php';

        $this->publishes([
            __DIR__ . '/../../config/refiner.php' => config_path('refiner.php'),
        ], 'refiner-config');
    }
}
