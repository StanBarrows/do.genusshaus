<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Genusshaus\App\Domain\Users\User;
use Smart6ate\Roles\Models\Uploadcare;

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
                'name' => 'Sebastian Fix',
                'email' => 'sebastian.fix@smartgate.ch',
                'password' => bcrypt('normal'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Oliver Reist',
                'email' => 'oliver.reist@smartgate.ch',
                'password' => bcrypt('genusshaus2018$$'),
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'name' => 'Dominik Sapinski',
                'email' => 'dsapinski@soft-evolution.com',
                'password' => bcrypt('genusshaus2018$$'),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        User::insert($users);
    }
}
