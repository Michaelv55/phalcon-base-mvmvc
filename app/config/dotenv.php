<?php

if (!file_exists(BASE_PATH . DIRECTORY_SEPARATOR . '.env')){
    throw new \Exception(".env file not found", 500);
}

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

if(!function_exists('getDotEnv')){
    function getDotEnv($name, $default = null){
        return key_exists($name, $_ENV) ? $_ENV[$name] : $default;
    }
}
