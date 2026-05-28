<?php

return [
    'default' => env('DB_CONNECTION', 'mongodb'),
    'connections' => [
        'mongodb' => [
            'driver' => 'mongodb',
            'dsn' => env('MONGODB_DSN', 'mongodb+srv://dmukeshmanoj_db_user:Mukesh%402006@cluster0.sew8ubi.mongodb.net/appointment-system'),
            'database' => env('DB_DATABASE', 'appointment-system'),
        ],
    ],
    'migrations' => 'migrations',
];
