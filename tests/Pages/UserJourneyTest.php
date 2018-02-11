<?php

namespace Tests\Unit\Pages;

use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Roles\Models\Role;
use Tests\TestCase;

class UserJourneyTest extends TestCase
{
    use DatabaseMigrations;

    protected $user, $place;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->withExceptionHandling();
        $this->user = $user = factory(User::class)->create(['active' => true]);
        $this->place = $place = factory(Place::class)->create(['user_id' => $user->id,'active' => true]);

        $this->signIn($user);

    }

    /** @test */
    public function a_user_can_visit_the_profile_page()
    {
        $this->get(route('users.profile.index'))->assertStatus(200);
    }


    /** @test */
    public function a_active_user_can_visit_a_place()
    {
        $this->get(route('places.dashboard.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_information()
    {
        $this->get(route('places.information.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_locations()
    {
        $this->get(route('places.locations.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_openings()
    {
        $this->get(route('places.openings.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_contacts()
    {
        $this->get(route('places.contacts.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_medias()
    {
        $this->get(route('places.medias.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_events()
    {
        $this->get(route('places.events.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_posts()
    {
        $this->get(route('places.posts.index', $this->place))->assertStatus(200);
    }

    /** @test */
    public function a_active_user_can_visit_the_place_settings()
    {
        $this->get(route('places.settings.index', $this->place))->assertStatus(200);
    }

}
