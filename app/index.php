<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

/**
 * error handler
 */
require APP_PATH . '/config/errorHandler.php';

/**
 * Include Vendor
 */
require BASE_PATH . '/vendor/autoload.php';

/**
 * Include Dotenv config
 */
require APP_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'dotenv.php';

/**
 * The FactoryDefault Dependency Injector automatically registers the services that
 * provide a full stack framework. These default services can be overidden with custom ones.
 */
$di = new FactoryDefault();

/**
 * Include Services
 */
require APP_PATH . '/config/services.php';

/**
 * Get config service for use in inline setup below
 */
$config = $di->getConfiguration();

/**
 * Include Autoloader
 */
require APP_PATH . '/config/loader.php';

/**
 * Starting the application
 * Assign service locator to the application
 */
$app = new Micro($di);

/**
 * Include Middlewares
 */
require APP_PATH . '/config/middleware.php';

/**
 * Include Application
 */
require APP_PATH . '/config/autoloadRoutes.php';