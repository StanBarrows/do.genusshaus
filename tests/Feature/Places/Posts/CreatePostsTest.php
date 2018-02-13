<?php

namespace Tests\Unit\Feature\Places\Posts;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->place = $place = create(Place::class);
    }

    /** @test */
    public function guests_may_not_create_posts()
    {
        $this->withExceptionHandling();
        $this->get(route('places.posts.create', $this->place))
            ->assertRedirect(route('login'));
        $this->post(route('places.posts.store', $this->place))
            ->assertRedirect(route('login'));
    }
}
