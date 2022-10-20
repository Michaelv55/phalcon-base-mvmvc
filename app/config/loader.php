<?php

/**
 * Local variables
 * @var Phalcon\Config $config
 */
$config;

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerDirs(array_values($config->directories->toArray()));

$nameSpaces = array_combine(array_map(function($item) use ($config){
    return $config->nameSpace . '\\' . ucfirst($item);
}, array_keys($config->directories->toArray())), $config->directories->toArray());

$loader->registerNamespaces($nameSpaces);

$loader->register();
