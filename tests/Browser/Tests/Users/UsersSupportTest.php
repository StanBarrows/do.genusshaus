<?php

namespace Tests\Browser\Tests\Supporters;

use Genusshaus\Domain\Users\Models\User;
use Tests\DuskTestCase;

class UsersSupportTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /** @test */
    public function access_users_support_index()
    {
        $path = route('users.support.index');

        $this->browse(function ($browser) use ($path) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                ->assertPathIs('/backend/users/support');
        });
    }
}
