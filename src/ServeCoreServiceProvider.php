<?php

namespace ServeCore\Ui;

use Illuminate\Support\ServiceProvider;
use ServeCore\Ui\Console\InstallCommand;

class ServeCoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share theme variable globally
        \Illuminate\Support\Facades\View::share('theme', 'default');

        // Register components
        \Illuminate\Support\Facades\Blade::component('button', \ServeCore\Components\Button::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
