<?php

namespace Tests\Unit\Users;

use Genusshaus\App\Domain\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    public function create_a_user()
    {
        $event = create(User::class);
        $this->assertInstanceOf(User::class, $event);
    }

    public function a_user_has_many_places()
    {
    }
}
