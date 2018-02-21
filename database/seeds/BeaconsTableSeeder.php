<?php


use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Seeder;

class BeaconsTableSeeder extends Seeder
{
    public function run()
    {
        $places = Place::all();

        foreach ($places as $place) {
            factory(Beacon::class, random_int(1, 3))
                ->create(['place_id' => $place->id]);
        }
    }
}
