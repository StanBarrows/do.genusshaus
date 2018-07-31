<?php

if (!function_exists('current_route')) {
    function current_route($route)
    {
        if (Route::currentRouteName() === $route) {
            return 'active';
        }
    }
}

if (!function_exists('current_place')) {
    function current_place()
    {
        $session = session()->get('place');

        $place = \Genusshaus\Domain\Places\Models\Place::find($session);

        return $place;
    }
}
