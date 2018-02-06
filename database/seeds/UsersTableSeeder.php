<?php

use Carbon\Carbon;
use Genusshaus\App\Domain\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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

        User::insert($users);
    }
}
