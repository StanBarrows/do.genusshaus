<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;

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

$factory->define(Place::class, function (Faker $faker) {
    return [
        'region_id' => Region::first()->id,
        'name'      => $faker->unique()->company,
        'active'    => $faker->boolean(false),
        'published' => $faker->boolean(false),
    ];
});
