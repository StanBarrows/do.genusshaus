<?php

namespace Genusshaus\App\Providers;

use Genusshaus\Http\Composers\NavigationComposers;
use Genusshaus\Http\Composers\PlacesComposers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.partials._navigation', NavigationComposers::class);
        View::composer('app.places.*', PlacesComposers::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
