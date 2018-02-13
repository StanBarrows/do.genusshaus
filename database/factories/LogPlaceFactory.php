<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Ressources\Models\Device;
use Genusshaus\Domain\Ressources\Models\LogPlace;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(LogPlace::class, function (Faker $faker) {
    return [

        'device_id' => Device::all(['id'])->random(),

        'place_id' => Place::all(['id'])->random(),

        'event' => 'visited',

        'pushed' => $faker->boolean(false),

    ];
});
