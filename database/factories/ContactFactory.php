<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\Contact;
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

$factory->define(Contact::class, function (Faker $faker) {
    return [

        'place_id' => function () {
            return factory(Place::class)->create()->id;
        },

        'name'      => $faker->name,
        'email'     => $faker->email,
        'web'       => $faker->url,
        'phone'     => $faker->phoneNumber,
        'facebook'  => $faker->url,
        'instagram' => $faker->url,
        'twitter'   => $faker->url,

    ];
});
