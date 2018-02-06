<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Post;

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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'uuid'     => $faker->uuid->unique(),
        'place_id' => function () {
            return factory(Place::class)->create()->id;
        },

        'published' => false,
        'pushed'    => false,

        'title'  => $faker->sentence(5, true),
        'teaser' => $faker->paragraph(1, true),
        'body'   => $faker->paragraph(3, true),

        'author' => $faker->name,
        'src'    => $faker->url,

    ];
});
