<?php

namespace Nifrasismail\Logger;

use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->register(LoggerServiceProvider::class);
    }
}
