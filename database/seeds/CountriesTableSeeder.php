<?php

use Genusshaus\Domain\Places\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {

        $countries = [
            [
                'code'       => 'CHE',
                'name'       => 'Switzerland',
            ],
            [
                'code'       => 'DEU',
                'name'       => 'Germany',
            ],
            [
                'code'       => 'AUT',
                'name'       => 'Austria',
            ],
            [
                'code'       => 'LIE',
                'name'       => 'Liechtenstein',
            ],
            [
                'code'       => 'FRA',
                'name'       => 'France',
            ],
            [
                'code'       => 'ITA',
                'name'       => 'Italy',
            ],

        ];

        Country::insert($countries);
    }
}
