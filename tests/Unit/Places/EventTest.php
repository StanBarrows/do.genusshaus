<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Event;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    public function a_event_belongs_to_an_place()
    {
        $event = create(Event::class);

        $this->assertInstanceOf(Place::class, $event->place);
    }
}
