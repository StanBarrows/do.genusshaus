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
        'uuid' => $faker->uuid->unique(),
        'region_id' => function()
        {
            return factory(Region::class)->create()->id;
        },
        'name' => $faker->company,
    ];
});
