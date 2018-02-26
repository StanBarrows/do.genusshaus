<?php

namespace Tests\Browser\Tests\Users;

use Illuminate\Http\Request;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /** @test */

    public function access_users_profile_index()
    {
        $path = route('users.profile.index');

        $this->browse(function ($browser) use($path) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                ->assertPathIs('/backend/users/profile');


        });
    }


}
