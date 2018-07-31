<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PlaceTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->withoutMiddleware();

        $this->place = setPlacesEnvironment();
    }

    /** @test */
    public function create_a_place()
    {
        $this->assertInstanceOf(Place::class, $this->place);
    }

    /** @test */
    public function a_place_has_many_user()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->users);

        /*  $user = create(User::class);
          $user->places()->attach($this->place);

          $this->assertInstanceOf(User::class, $this->place->users->first());*/
    }

    /** @test */
    public function a_place_belongs_to_one_region()
    {
        $this->assertInstanceOf(Region::class, $this->place->region);
    }

    /** @test */
    public function a_place_has_many_beacons()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->beacons);
    }

    /** @test */
    public function a_place_has_many_opening_hours()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->openingHours);
    }

    /** @test */
    public function a_place_has_many_events()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->events);
    }

    /** @test */
    public function a_place_has_many_posts()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->posts);
    }
}
