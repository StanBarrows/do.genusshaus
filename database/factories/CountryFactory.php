<?php

use Faker\Generator as Faker;
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

$factory->define(Country::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->countryCode,
        'name' => $faker->unique()->country
    ];
});
