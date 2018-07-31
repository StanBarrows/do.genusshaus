<?php

use Faker\Factory as Faker;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        $places = Place::all();

        foreach ($places as $place) {
            $faker = Faker::create();

            $place->uploadcares()->create([
                'uploadcareable_id' => $place->id,
                'uuid'              => $faker->uuid,
                'url'               => $faker->imageUrl(900, 600),
            ]);
        }
    }
}
