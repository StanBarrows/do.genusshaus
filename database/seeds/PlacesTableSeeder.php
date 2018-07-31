<?php

use Faker\Factory as Faker;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    public function run()
    {
        $region = Region::first() ?: factory(Region::class)->create();

        factory(Place::class, 3)
                ->create(['region_id' => $region->id])
                ->each(function ($place) {
                    $faker = Faker::create();

                    $place->uploadcares()->create([
                        'uploadcareable_id' => $place->id,
                        'uuid'              => $faker->uuid,
                        'url'               => $faker->imageUrl(900, 600),
                    ]);
                });
    }
}
