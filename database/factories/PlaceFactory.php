<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
use Genusshaus\Domain\Users\Models\User;

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

        'user_id' => function () {
            return factory(User::class)->create()->id;
        },

        'region_id' => function () {
            return factory(Region::class)->create()->id;
        },
        'name'                   => $faker->company,
        'description'            => $faker->paragraph(3),
        'active'                 => $faker->boolean(true),
        'image_processed'        => true,
        'published'              => $faker->boolean(),
    ];
});
