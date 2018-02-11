<?php

namespace Tests\Unit\Pages;

use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Roles\Models\Role;
use Tests\TestCase;

class SupportersJourneyTest extends TestCase
{
    use DatabaseMigrations;

    protected $user, $place;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->withExceptionHandling();
        $this->user = $user = factory(User::class)->create(['active' => true]);



        $this->signIn($user);

    }

    /** @test */
    public function a_user_without_access_can_not_visit_the_supporters_page()
    {
        $this->get(route('supporters.index'))->assertStatus(404);
    }

    /** @test */
    public function a_user_with_access_can_visit_the_supporters_page()
    {
        $this->addSupporterRole();

        $this->get(route('administrators.dashboard.index'))->assertStatus(404);
        $this->get(route('moderators.dashboard.index'))->assertStatus(404);
        $this->get(route('supporters.index'))->assertStatus(200);
    }


    public function addSupporterRole()
    {
        $role = factory(Role::class)->create(['title' => 'supporter']);
        $this->user->roles()->attach($role);
    }




}
