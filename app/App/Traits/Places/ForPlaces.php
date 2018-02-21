<?php

namespace Genusshaus\App\Traits\Places;

use Genusshaus\App\Manager\Places\Manager;
use Genusshaus\App\Observers\Places\PlacesObserver;
use Genusshaus\App\Scopes\Places\PlaceScope;

trait ForPlaces
{
    public static function boot()
    {
        parent::boot();

        $manager = app(Manager::class);

        static::addGlobalScope(
            new PlaceScope($manager->getPlace())
        );


        static::observe(
            app(PlacesObserver::class)
        );
    }
}
