<?php

namespace Tests\Unit\Places;

use Genusshaus\App\Domain\Users\User;
use Genusshaus\Domain\Places\Models\Contact;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
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
        $this->assertInstanceOf(Place::class,  $this->place);
    }


    /** @test */
    public function a_place_belongs_to_one_user()
    {
        $this->assertInstanceOf(User::class,  $this->place->user);
    }

    /** @test */
    public function a_place_belongs_to_one_region()
    {
        $this->assertInstanceOf(Region::class,  $this->place->region);
    }


    /** @test */
    public function a_place_has_one_contact()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasOne',  $this->place->contact());
    }

    /** @test */
    public function a_place_has_one_address()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasOne',  $this->place->address());
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
