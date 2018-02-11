<?php

use Genusshaus\Domain\Places\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $countries = [
            [
                'code'       => 'CH',
                'name'       => 'Switzerland',
            ],

        ];

        Country::insert($countries);
    }
}
