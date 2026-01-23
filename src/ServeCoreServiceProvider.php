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
