<?php

use Genusshaus\Domain\Places\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            [
                'name'         => 'Basel',
                'active'       => true,
            ],
            [
                'name'         => 'Zürich',
                'active'       => false,

            ],
            [
                'name'         => 'Freiburg',
                'active'       => false,

            ],
        ];

        Region::insert($regions);
    }
}
