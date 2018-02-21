<?php

use Spatie\Tags\Tag;
use Genusshaus\Domain\Places\Models\Place;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($x = 0; $x <= 200; $x++) {

            Tag::create([
                'name' => $faker->unique()->city
            ]);
        }

        $places = Place::all();

        foreach ($places as $place) {

            for ($x = 0; $x <= random_int(5, 35); $x++) {
                $tag = Tag::find(Tag::all()->random()->id);
                $place->attachTag($tag);
            }
        }
    }
}
