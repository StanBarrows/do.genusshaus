<?php

namespace Tests\Unit\Users;

use Genusshaus\Domain\Users\Models\User;
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
}
