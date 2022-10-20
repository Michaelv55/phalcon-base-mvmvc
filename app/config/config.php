<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

$dataBaseConfig = include APP_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';

return new \Phalcon\Config(array_merge($dataBaseConfig, [
    'application' => [
        'routesDir' => APP_PATH .'/routes/',
        'modelsDir'      => APP_PATH . '/models/',
        'controllersDir' => APP_PATH . '/controllers/',
        'middlewareDir' => APP_PATH . '/middlewares/',
        'helpersDir' => APP_PATH . '/helpers/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'baseUri'        => '/',
    ],

    'middleware' => [
        'before' => [
            Authentication::class
        ],
        'after' => [
            Response::class
        ]
    ],
]));
