<?php

/**
 * Array of all database connections
 */

return [
    'database' => [
        'adapter' => getDotEnv('DB_ADAPTER', 'Mysql'),
        'host' => getDotEnv('DB_HOST', 'localhost'),
        'username' => getDotEnv('DB_USERNAME', 'root'),
        'password' => getDotEnv('DB_PASSWORD', ''),
        'dbname' => getDotEnv('DB_NAME', ''),
        'charset' => getDotEnv('DB_CHARSET', 'utf8'),
    ],
];