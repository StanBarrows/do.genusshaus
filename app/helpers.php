<?php

if (!function_exists('current_route')) {
    function current_route($route)
    {
        if (Route::currentRouteName() === $route) {
            return 'active';
        }
    }
}
