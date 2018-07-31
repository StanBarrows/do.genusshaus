<?php

use Genusshaus\Domain\Places\Models\OpeningHour;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Seeder;

class OpeningHoursTableSeeder extends Seeder
{
    public function run()
    {
        $places = Place::all();

        foreach ($places as $place) {
            factory(OpeningHour::class, random_int(1, 2))->create(['place_id' => $place->id]);
        }
    }
}
