<?php

namespace Tests\Unit\Pages;

use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Roles\Models\Role;
use Tests\TestCase;

class ModeratorsJourneyTest extends TestCase
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
    public function a_user_can_not_visit_the_moderators_dashboard_page()
    {
        $this->get(route('moderators.dashboard.index'))->assertStatus(404);

    }

    /** @test */
    public function a_moderator_can_visit_the_moderators_dashboard_page()
    {
        $this->addModeratorsRole();

        $this->get(route('moderators.dashboard.index'))->assertStatus(200);

    }

    /** @test */
    public function a_user_can_not_visit_the_create_a_new_place_page()
    {
        $this->get(route('moderators.places.create'))->assertStatus(404);

    }

    /** @test */
    public function a_moderator_can_visit_the_create_a_new_place_page()
    {
        $this->addModeratorsRole();

        $this->get(route('moderators.places.create'))->assertStatus(200);

    }

    /** @test */
    public function a_user_can_not_visit_the_manage_places_page()
    {
        $this->get(route('moderators.places.index'))->assertStatus(404);

    }

    /** @test */
    public function a_moderator_can_visit_the_manage_places_page()
    {
        $this->addModeratorsRole();

        $this->get(route('moderators.places.index'))->assertStatus(200);

    }

    /** @test */
    public function a_user_can_not_visit_the_manage_regions_page()
    {
        $this->get(route('moderators.regions.index'))->assertStatus(404);
    }


    /** @test */
    public function a_moderator_can_visit_the_manage_regions_page()
    {
        $this->addModeratorsRole();

        $this->get(route('moderators.regions.index'))->assertStatus(200);
    }

    /** @test */
    public function a_user_can_not_visit_the_manage_countries_page()
    {
        $this->get(route('moderators.countries.index'))->assertStatus(404);
    }

    /** @test */
    public function a_moderator_can_visit_the_manage_countries_page()
    {
        $this->addModeratorsRole();

        $this->get(route('moderators.countries.index'))->assertStatus(200);

    }

    public function addModeratorsRole()
    {
        $role = factory(Role::class)->create(['title' => 'moderator']);
        $this->user->roles()->attach($role);
    }



}
