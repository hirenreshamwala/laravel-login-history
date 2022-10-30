<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'api_token' => env('IPINFO_API_TOKEN', ''),

    'history' => [
        'table' => 'user_login_histories',
        'model' => \Xt\LoginHistory\Models\UserLoginHistory::class,
    ],
];
