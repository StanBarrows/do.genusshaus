<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    public function create_a_post()
    {
        $post = create(Post::class);
        $this->assertInstanceOf(Post::class, $post);
    }

    /** @test */
    public function a_post_belongs_to_one_place()
    {
        $post = create(Post::class);
        $this->assertInstanceOf(Place::class, $post->place);
    }
}
