<?php

namespace Genusshaus\App\Providers;

use Illuminate\Support\ServiceProvider;
use Recombee\RecommApi\Client;

class RecombeeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {




    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->singleton('recombee', function($app) {

            $database_id = config('recombee.database_id');
            $secret_token = config('recombee.secret_token');

            return new Client($database_id, $secret_token);

        });


    }
}
