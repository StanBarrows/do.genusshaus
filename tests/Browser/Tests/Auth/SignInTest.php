<?php

namespace Tests\Browser\Tests\Auth;

use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Auth\SignInPage;
use Tests\DuskTestCase;

class SignInTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group auth
     */
    public function a_user_can_sign_in()
    {
        $path = route('login');

        $user = factory(User::class)->create([

            'name'     => 'Max Mustermann',
            'email'    => 'max.mustermann@genusshaus.ch',
            'password' => bcrypt('password'),

        ]);

        $this->browse(function ($browser) use ($path, $user) {
            $browser
                ->visit(new SignInPage())
                ->signIn($user->email, 'password')
                ->assertPathIs('/backend/users/dashboard')
                ->assertSeeIn('.navbar', $user->name);
        });
    }
}
