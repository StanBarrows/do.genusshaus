<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Support\Str;

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

$factory->define(Beacon::class, function (Faker $faker) {
    return [

        'place_id' => function () {
            return factory(Place::class)->create()->id;
        },
        'estimote_id' => Str::random(16),
        'major'       => $faker->numberBetween(1, 250),
        'minor'       => $faker->numberBetween(1, 250),
    ];
});
