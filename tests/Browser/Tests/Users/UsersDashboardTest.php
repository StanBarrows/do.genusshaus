<?php

namespace Tests\Browser\Tests\Users;

use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class UsersDashboardTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'DatabaseSeeder']);
    }

    /** @test */
    public function access_users_dashboard_index()
    {
        $path = route('users.dashboard.index');

        $this->browse(function ($browser) use ($path) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                ->assertPathIs('/backend/users/dashboard');
        });
    }

    /**
     * @test
     * @group users
     */

    public function access_to_active_places()
    {
        $path = route('users.dashboard.index');

        $place =  create(Place::class);
        $place->active = true;
        $place->save();

        $user = User::first();

        $place->users()->attach($user);

        $this->browse(function ($browser) use ($path, $user, $place) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                 ->resize(1920, 1080)
                ->assertSee($place->name)
                ->assertSee($user->name);
        });
    }
}

