<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

if(!in_array(APP_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'dotenv.php', get_included_files())){
    include APP_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'dotenv.php';
}

$dirConfig = [
    'base' => '/',
    'routes' => APP_PATH . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR,
    'models' => APP_PATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR,
    'controllers' => APP_PATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR,
    'middlewares' => APP_PATH . DIRECTORY_SEPARATOR . 'middlewares' . DIRECTORY_SEPARATOR,
    'helpers' => APP_PATH . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR,
    'migrations' => APP_PATH . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR,
    'views' => APP_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR,
];

$middlewaresConfig = [
    'before' => [
        Authentication::class,
    ],
    'after' => [
        Response::class,
    ]
];

return new \Phalcon\Config([
    'nameSpace' => getDotEnv('APP_NAMESPACE', 'App'),
    'databases' => include APP_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php',
    'directories' => $dirConfig,
    'middlewares' => $middlewaresConfig,
]);
