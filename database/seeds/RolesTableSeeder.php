<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Smart6ate\Roles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $roles = [

            [
                'title' => 'administrator',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'moderator',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'supporter',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        Role::insert($roles);
    }
}
