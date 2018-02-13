<?php

namespace Tests\Unit\Feature\Places\Events;

use Genusshaus\Domain\Places\Models\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateEventsTest extends TestCase
{
    use DatabaseMigrations;

    protected $event;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->event = $event = create(Event::class);
    }

    /** @test */
    public function guests_may_not_create_posts()
    {
        $this->withExceptionHandling();
        $this->get(route('places.events.create', $this->event))
            ->assertRedirect(route('login'));
        $this->post(route('places.events.store', $this->event))
            ->assertRedirect(route('login'));
    }
}
