<?php

namespace ServeCore;

use Illuminate\Support\ServiceProvider;
use ServeCore\Console\InstallCommand;

class ServeCoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share theme variable globally
        \Illuminate\Support\Facades\View::share('theme', 'default');

        // Register components
        \Illuminate\Support\Facades\Blade::component('button', \ServeCore\Components\Button::class);
        \Illuminate\Support\Facades\Blade::component('badge', \ServeCore\Components\Badge::class);
        \Illuminate\Support\Facades\Blade::component('alert', \ServeCore\Components\Alert::class);
        \Illuminate\Support\Facades\Blade::component('avatar', \ServeCore\Components\Avatar::class);
        \Illuminate\Support\Facades\Blade::component('avatar-image', \ServeCore\Components\AvatarImage::class);
        \Illuminate\Support\Facades\Blade::component('avatar-fallback', \ServeCore\Components\AvatarFallback::class);
        \Illuminate\Support\Facades\Blade::component('skeleton', \ServeCore\Components\Skeleton::class);
        \Illuminate\Support\Facades\Blade::component('separator', \ServeCore\Components\Separator::class);

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
