<?php

use Faker\Generator as Faker;

use Genusshaus\Domain\Ressources\Models\Post;
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

$factory->define(Post::class, function (Faker $faker) {
    return [

        'place_id' => function () {
            return factory(Place::class)->create()->id;
        },

        'uuid' => (string) Str::uuid(),

        'title'  => $faker->sentence(5, true),
        'teaser' => $faker->paragraph(3, true),
        'body'   => $faker->paragraph(15, true),

        'author' => $faker->name,
        'src'    => $faker->url,

        'published' => $faker->boolean(false),
        'pushed'    => $faker->boolean(false),
        'image'     => $faker->boolean(false),




    ];
});
