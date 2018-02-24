<?php

// load our environment files - used to store credentials & configuration
(new Dotenv\Dotenv(__DIR__))->load();

return
    [
    'paths'        => [
        'migrations' => 'database/migrations'
    ],
    'environments' =>
    [
        'default_database'        => 'development',
        'default_migration_table' => 'migrations',
        'development'             =>
        [
            'adapter'   => 'mysql',
            'host'      => $_ENV['DB_HOST'],
            'name'      => $_ENV['DB_NAME'],
            'user'      => $_ENV['DB_USER'],
            'pass'      => $_ENV['DB_PASS'],
            'port'      => $_ENV['DB_PORT'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]
    ]
];
