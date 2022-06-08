<?php
return [
    'log_table_name' => 'my_phoenix_log',
    'migration_dirs' => [
        'first' => __DIR__ . '/Migration/first_dir',
        'second' => __DIR__ . '/Migration/second_dir',
    ],
    'environments' => [
        'local' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'port' => 3306, 
            'username' => 'root',
            'password' => '',
            'db_name' => 'blog',
            'charset' => 'utf8', 
            'collation' => 'utf8_unicode_ci',
        ],
        'production' => [
            'adapter' => 'mysql',
            'host' => 'production_host',
            'username' => 'user',
            'password' => 'pass',
            'db_name' => 'my_production_db',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ],
    ],
    'default_environment ' => 'local',
];