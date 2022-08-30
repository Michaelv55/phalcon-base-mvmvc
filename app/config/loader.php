<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerDirs([
    $config->application->modelsDir,
    $config->application->controllersDir,
    $config->application->middlewareDir,
    $config->application->helpersDir,
]);

$loader->registerNamespaces([
    'App\Models' => $config->application->modelsDir,
    'App\Controllers' => $config->application->controllersDir,
    'App\Middleware' => $config->application->middlewareDir,
    'App\Helpers' => $config->application->helpersDir
]);

$loader->register();
