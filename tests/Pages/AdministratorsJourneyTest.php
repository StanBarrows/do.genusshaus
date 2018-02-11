<?php

namespace Tests\Unit\Pages;

use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Roles\Models\Role;
use Tests\TestCase;

class AdministratorsJourneyTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;
    protected $place;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->withExceptionHandling();
        $this->user = $user = factory(User::class)->create(['active' => true]);

        $this->signIn($user);
    }

    /** @test */
    public function a_user_can_not_visit_the_administrators_dashboard_page()
    {
        $this->get(route('administrators.dashboard.index'))->assertStatus(404);
    }

    /** @test */
    public function a_administrator_can_visit_the_administrators_dashboard_page()
    {
        $this->addAdministratorsRole();

        $this->get(route('administrators.dashboard.index'))->assertStatus(200);
    }

    /** @test */
    public function a_user_can_not_visite_the_create_a_new_users_page()
    {
        $this->get(route('administrators.users.create'))->assertStatus(404);
    }

    /** @test */
    public function a_administrator_can_visite_the_create_a_new_users_page()
    {
        $this->addAdministratorsRole();
        $this->get(route('administrators.users.create'))->assertStatus(200);
    }

    /** @test */
    public function a_user_can_not_visite_the_manage_users_page()
    {
        $this->get(route('administrators.users.index'))->assertStatus(404);
    }

    /** @test */
    public function a_administrator_can_visite_the_manage_users_page()
    {
        $this->addAdministratorsRole();
        $this->get(route('administrators.users.index'))->assertStatus(200);
    }

    /** @test */
    public function a_user_can_not_visite_the_manage_logs_page()
    {
        $this->get(route('administrators.logs.index'))->assertStatus(404);
    }

    /** @test */
    public function a_administrator_can_visite_the_manage_logs_page()
    {
        $this->addAdministratorsRole();
        $this->get(route('administrators.logs.index'))->assertStatus(200);
    }

    public function addAdministratorsRole()
    {
        $role = factory(Role::class)->create(['title' => 'administrator']);
        $this->user->roles()->attach($role);
    }
}
