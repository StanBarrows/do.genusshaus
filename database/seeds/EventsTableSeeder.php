<?php

use Faker\Factory as Faker;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Ressources\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        $places = Place::all();

        foreach ($places as $place) {
            factory(Event::class, random_int(1, 4))
                ->create(['place_id' => $place->id])
                ->each(function ($event) {
                    $faker = Faker::create();

                    $event->uploadcares()->create([
                        'uploadcareable_id' => $event->id,
                        'uuid'              => $faker->uuid,
                        'url'               => $faker->imageUrl(1800, 1200),
                    ]);
                });
        }
    }
}
