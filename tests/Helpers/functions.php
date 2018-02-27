<?php

function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}
function make($class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}

function setPlacesEnvironment()
{
    $place = create(\Genusshaus\Domain\Places\Models\Place::class);
    app(\Genusshaus\App\Manager\Places\Manager::class)->setPlace($place);
    session()->put('place', $place->id);

    return $place;
}
