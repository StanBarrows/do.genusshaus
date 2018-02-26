<?php

namespace Tests\Browser\Tests\Administrators;

use Illuminate\Http\Request;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdministratorsDashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /** @test */

    public function access_administrators_dashboard_index()
    {
        $path = route('administrators.dashboard.index');

        $this->browse(function ($browser) use($path) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                ->assertPathIs('/backend/administrators');


        });
    }


}
