<?php

use Carbon\Carbon;
use Smart6ate\Roles\Models\Role;
use Genusshaus\App\Domain\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{


    public function run()
    {
        $now = Carbon::now();

        $users = [
            [
                'name'       => env('DEFAULT_USER_NAME'),
                'email'      => env('DEFAULT_USER_EMAIL'),
                'password'   => bcrypt(env('DEFAULT_USER_PASSWORD')),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $roles = Role::all();

        User::insert($users);

        $user = User::first();

        foreach($roles as $role)
        {
            $user->roles()->attach($role);
        }


    }
}
