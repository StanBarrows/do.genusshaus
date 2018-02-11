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
        $this->place = $place = create(Place::class);
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
    }

    /** @test */
    public function a_place_belongs_to_one_region()
    {
        $this->assertInstanceOf(Region::class, $this->place->region);
    }

    /** @test */
    public function a_place_has_one_contact()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasOne', $this->place->contact());
    }

    /** @test */
    public function a_place_has_one_address()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasOne', $this->place->address());
    }

    /** @test */
    public function a_place_has_many_beacons()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->beacons);
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
