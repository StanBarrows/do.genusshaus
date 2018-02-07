<?php

use Carbon\Carbon;
use Genusshaus\Domain\Places\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $regions = [
            [
                'name'       => 'Basel',
            ],
            [
                'name'       => 'Zürich',
            ],
            [
                'name'       => 'Freiburg',
            ],
        ];

        Region::insert($regions);
    }
}
