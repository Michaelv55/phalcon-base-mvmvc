<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

$configurations = include APP_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'configuration.php';

return new \Phalcon\Config([
    'database' => $configurations->databases->main,
    'application' => array_merge(['baseUri' => '/'], array_combine(array_map(function($item){
            return $item . 'Dir';
        }, array_keys($configurations->directories->toArray())), $configurations->directories->toArray())),
]);