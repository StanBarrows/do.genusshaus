<?php

return [

    'telegram' => [
        'api_token'         => '',
        'bot_username'      => '',
        'channel_username'  => '',
        'channel_signature' => '',
    ],

    'twitter' => [
        'consurmer_key'       => '',
        'consurmer_secret'    => '',
        'access_token'        => '',
        'access_token_secret' => '',
    ],

    'facebook' => [
        'app_id'                => env('FACEBOOK_APP_ID'),
        'app_secret'            => env('FACEBOOK_APP_SECRET'),
        'default_graph_version' => '2.11',
        'page_access_token'     => env('FACEBOOK_ACCESS_TOKEN'),
    ],

];
