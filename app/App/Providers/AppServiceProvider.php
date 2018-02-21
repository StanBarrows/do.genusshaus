<?php

namespace Genusshaus\App\Providers;

use Genusshaus\App\Manager\Places\Manager;
use Genusshaus\App\Observers\Places\PlacesObserver;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      /*  \DB::listen(function ($sql){

        dump($sql->sql);

        });*/

        Resource::withoutWrapping();

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
