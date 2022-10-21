<?php

use Phalcon\Events\Manager;

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */
$app;

foreach ($app->configuration->middlewares->before as $key => $value) {
    $app->before(new $value());
}

foreach ($app->configuration->middlewares->after as $key => $value) {
    $app->after(new $value());
}