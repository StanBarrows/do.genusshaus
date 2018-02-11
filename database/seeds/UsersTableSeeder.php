<?php

use Carbon\Carbon;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Smart6ate\Roles\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $users = [
            [
                'name'       => 'Sebastian Fix',
                'email'      => 'sebastian.fix@smartgate.ch',
                'password'   => bcrypt('UwaEbEG7owrEiVxzkbiBt8B'),
                'active'     => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'name'       => 'Oliver Reist',
                'email'      => 'oliver.reist@smartgate.ch',
                'password'   => bcrypt('sNcsQvQx8HkYA7fwjmrpjdv'),
                'active'     => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $roles = Role::all();

        User::insert($users);

        $all_users = User::all();

        foreach ($all_users as $user) {
            foreach ($roles as $role) {
                $user->roles()->attach($role);
            }
        }


    }
}
