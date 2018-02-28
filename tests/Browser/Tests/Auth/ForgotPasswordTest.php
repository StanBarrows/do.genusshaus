<?php

namespace Tests\Browser\Tests\Auth;

use Genusshaus\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Auth\ForgotPasswordPage;
use Tests\DuskTestCase;

class ForgotPasswordTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group auth
     */
    public function a_user_can_send_a_reset_password_email()
    {
        $path = route('login');

        $user = factory(User::class)->create([

            'name'     => 'Max Mustermann',
            'email'    => 'max.mustermann@genusshaus.ch',
            'password' => bcrypt('password'),

        ]);

        $this->browse(function ($browser) use ($path, $user) {
            $browser
                ->visit(new ForgotPasswordPage())
                ->sendPasswordResetLink($user->email)
                ->assertSeeIn('.card', 'We have e-mailed your password reset link!');
        });
    }
}
