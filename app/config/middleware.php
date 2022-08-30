<?php

use Phalcon\Events\Manager;

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */
$app;

foreach ($app->config->middleware->before as $key => $value) {
    $app->before(new $value());
}

foreach ($app->config->middleware->after as $key => $value) {
    $app->after(new $value());
}