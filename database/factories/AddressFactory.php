<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\Address;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Country;

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

$factory->define(Address::class, function (Faker $faker) {
    return [
        'place_id' => function () {
            return factory(Place::class)->create()->id;
        },

        'company' => $faker->company,
        'street' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'country_id' => function () {
            return factory(Country::class)->create()->id;
        },
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,


    ];
});
