<?php

namespace ServeCore\Ui;

use Illuminate\Support\ServiceProvider;
use ServeCore\Ui\Console\InstallCommand;

class ServeCoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
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
