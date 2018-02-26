<?php

namespace Tests\Browser\Tests\Users;

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
}
