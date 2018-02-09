<?php

namespace Tests\Unit\Moderators;

use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    public function create_a_beacon()
    {
        $beacon = create(Beacon::class);
        $this->assertInstanceOf(Beacon::class, $beacon);
    }


    /** @test */
    public function a_beacon_belongs_to_one_place()
    {
        $beacon = create(Beacon::class);
        $this->assertInstanceOf(Place::class, $beacon->place);
    }
}
