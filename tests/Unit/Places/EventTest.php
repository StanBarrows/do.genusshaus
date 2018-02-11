<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Event;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    protected $event;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->event = $event = create(Event::class);
    }



    /** @test */
    public function create_a_event()
    {
        $this->assertInstanceOf(Event::class, $this->event);
    }

    /** @test */
    public function a_event_belongs_to_one_place()
    {
        $this->assertInstanceOf(Place::class, $this->event->place);
    }
}
