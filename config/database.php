<?php

return [
    'default' => env('DB_CONNECTION', 'mongodb'),
    'connections' => [
        'mongodb' => [
            'driver' => 'mongodb',
            'dsn' => env('MONGODB_DSN'),
            'database' => env('DB_DATABASE'),
        ],
    ],
    'migrations' => 'migrations',
];
