<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\Event;
use Genusshaus\Domain\Places\Models\Place;

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

$factory->define(Event::class, function (Faker $faker) {
    return [

        'place_id' => function () {
            return factory(Place::class)->create()->id;
        },

        'published' => $faker->boolean(),
        'pushed'    => false,

        'name'        => $faker->sentence(5, true),
        'description' => $faker->paragraph(3, true),

        'start'  => $faker->dateTimeBetween('now','+2 years'),
        'finish' => null,
    ];
});
