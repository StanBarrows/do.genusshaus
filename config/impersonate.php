<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Users Model
    |--------------------------------------------------------------------------
    |
    */
        'users' => [

            'model' => Genusshaus\App\Domain\Users\User::class,
        ],

        'redirect_route' => 'dashboard.index',
];
