<?php

use Phalcon\Events\Manager;

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */
$app;

foreach ($app->config->middlewares->before as $key => $value) {
    $app->before(new $value());
}

foreach ($app->config->middlewares->after as $key => $value) {
    $app->after(new $value());
}