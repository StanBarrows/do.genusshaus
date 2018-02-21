<?php

use Faker\Generator as Faker;
use Genusshaus\Domain\Places\Models\OpeningHour;
use Genusshaus\Domain\Places\Models\Place;

use Carbon\Carbon;
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

$factory->define(OpeningHour::class, function (Faker $faker) {

    $carbon = Carbon::createFromFormat('H:i:s','08:00:00');
    $new_carbon = Carbon::createFromFormat('H:i:s','08:30:00')->addHours(random_int(1,9));

    return [

        'place_id' => function () {
            return factory(Place::class)->create()->id;
        },

        'weekday' => random_int(1,7),

        'open'  => $carbon,
        'close'  => $new_carbon
    ];
});
