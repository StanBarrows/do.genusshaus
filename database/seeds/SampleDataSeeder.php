<?php

use Faker\Factory as Faker;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Address;
use Genusshaus\Domain\Places\Models\Contact;
use Genusshaus\Domain\Places\Models\Country;
use Genusshaus\Domain\Places\Models\Event;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Post;
use Genusshaus\Domain\Places\Models\Region;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)
            ->create()
            ->each(function ($user) {
            });

        $users = User::all();

        foreach ($users as $user) {
            $region = Region::first()->id ?: factory(Region::class)->create()->id;

            factory(Place::class, random_int(1, 3))
                ->create(['user_id' => $user->id, 'region_id' => $region, 'image_processed' => true])
                ->each(function ($place) {
                    $faker = Faker::create();

                    $place->uploadcares()->create([
                        'uploadcareable_id' => $place->id,
                        'uuid'              => $faker->uuid,
                        'url'               => $faker->imageUrl(1800, 1200),
                        'processed'         => true,
                    ]);

                    $place->contact()->save(factory(Contact::class)->create(['place_id' => $place->id]));

                    $country = Country::first()->id ?: factory(Country::class)->create()->id;

                    factory(Address::class, 1)
                        ->create(['place_id' => $place->id, 'country_id'=> $country])
                        ->each(function ($place) {
                        });

                    factory(Beacon::class, random_int(1, 3))
                        ->create(['place_id' => $place->id])
                        ->each(function ($place) {
                        });

                    factory(Event::class, random_int(1, 3))
                        ->create(['place_id' => $place->id])
                        ->each(function ($event) {
                            $faker = Faker::create();

                            $event->uploadcares()->create([
                                'uploadcareable_id' => $event->id,
                                'uuid'              => $faker->uuid,
                                'url'               => $faker->imageUrl(1800, 1200),
                                'processed'         => true,
                            ]);
                        });

                    factory(Post::class, random_int(1, 3))
                        ->create(['place_id' => $place->id])
                        ->each(function ($post) {
                            $faker = Faker::create();

                            $post->uploadcares()->create([
                                'uploadcareable_id' => $post->id,
                                'uuid'              => $faker->uuid,
                                'url'               => $faker->imageUrl(1800, 1200),
                                'processed'         => true,
                            ]);
                        });
                });
        }
    }
}
