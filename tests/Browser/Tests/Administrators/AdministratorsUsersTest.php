<?php

namespace Tests\Browser\Tests\Administrators;

use Genusshaus\Domain\Users\Models\User;
use Tests\DuskTestCase;

class AdministratorsUsersTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /** @test */
    public function access_administrators_users_index()
    {
        $path = route('administrators.users.index');

        $this->browse(function ($browser) use ($path) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                ->assertPathIs('/backend/administrators/users');
        });
    }

    /** @test */
    public function access_administrators_users_create()
    {
        $path = route('administrators.users.create');

        $this->browse(function ($browser) use ($path) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                ->assertPathIs('/backend/administrators/users/create');
        });
    }
}
