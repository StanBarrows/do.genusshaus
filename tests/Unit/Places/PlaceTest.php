<?php

namespace Tests\Unit\Places;

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
    }

    /** @test */
    public function a_place_belongs_to_an_region()
    {
        $place = create(Place::class);
        $this->assertInstanceOf(Region::class, $place->region);
    }

    /** @test */
    public function a_place_has_events()
    {
        $this->place = create(Place::class);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->events);
    }

    /** @test */
    public function a_place_has_posts()
    {
        $this->place = create(Place::class);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->place->posts);
    }
}
