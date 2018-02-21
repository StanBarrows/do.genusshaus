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

        'region_id' => function () {
            return factory(Region::class)->create()->id;
        },
        'name'                   => $faker->company,
        'description'            => $faker->paragraph(3),

        'location_street'     => $faker->streetAddress,
        'location_postcode'   => $faker->postcode,
        'location_city'       => $faker->city,

        'location_latitude'  => $faker->randomFloat(),
        'location_latitude'  => $faker->randomFloat(8, 47.51990000, 47.57120000),
        'location_longitude' => $faker->randomFloat(8, 7.54808000, 7.69440000),

        'contact_name'       => $faker->name,
        'contact_avatar'     => $faker->imageUrl(100, 100),

        'contact_email'       => $faker->email,
        'contact_web'         => $faker->url,
        'contact_phone'       => $faker->phoneNumber,
        'contact_facebook'    => $faker->url,
        'contact_instagram'   => $faker->url,
        'contact_twitter'     => $faker->url,

        'open'                   => false,
        'image'                  => false,
        'active'                 => false,
        'published'              => false,
        'reviewed'               => true,
    ];
});
