<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */
$app;

$collection = new MicroCollection();
$collection->setHandler(new WelcomeController());

$collection->setPrefix('/welcome')
    ->get('/', 'index');


$app->mount($collection);
