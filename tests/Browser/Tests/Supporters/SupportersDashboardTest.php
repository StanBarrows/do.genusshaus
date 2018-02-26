<?php

namespace Tests\Browser\Tests\Supporters;

use Illuminate\Http\Request;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SupportersDashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /** @test */

    public function access_supporters_dashboard_index()
    {
        $path = route('supporters.index');

        $this->browse(function ($browser) use($path) {
            $browser
                ->loginAs(User::find(1))
                ->visit($path)
                ->assertPathIs('/backend/supporters');


        });
    }


}
