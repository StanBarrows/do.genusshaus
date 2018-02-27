<?php

namespace Genusshaus\App\Providers;

use Genusshaus\App\Manager\Places\Manager;
use Genusshaus\App\Observers\Places\PlacesObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);


        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }

        /*  \DB::listen(function ($sql){

          dump($sql->sql);

          });*/

        $this->app->singleton(Manager::class, function () {
            return new Manager();
        });

        $this->app->singleton(PlacesObserver::class, function () {
            return new PlacesObserver(app(Manager::class)->getPlace());
        });

        Request::macro('place', function () {
            return app(Manager::class)->getPlace();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
