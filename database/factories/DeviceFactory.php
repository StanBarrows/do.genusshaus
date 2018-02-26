<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Users\Models\Device;
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

$factory->define(Device::class, function (Faker $faker) {
    return [

        'uuid'       => Str::uuid(),
        'push_token'       => Str::random(20),
    ];
});
