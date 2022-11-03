<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'index.php';

/**
 * Handle the request
 */
$app->handle($_SERVER['REQUEST_URI']);