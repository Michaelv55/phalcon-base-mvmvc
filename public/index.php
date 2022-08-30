<?php
declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

include APP_PATH . '/config/errorHandler.php';

/**
 * The FactoryDefault Dependency Injector automatically registers the services that
 * provide a full stack framework. These default services can be overidden with custom ones.
 */
$di = new FactoryDefault();

/**
 * Include Vendor
 */
include BASE_PATH . '/vendor/autoload.php';

/**
 * Include Services
 */
include APP_PATH . '/config/services.php';

/**
 * Get config service for use in inline setup below
 */
$config = $di->getConfig();

/**
 * Include Autoloader
 */
include APP_PATH . '/config/loader.php';

/**
 * Starting the application
 * Assign service locator to the application
 */
$app = new Micro($di);

/**
 * Include Middlewares
 */
include APP_PATH . '/config/middleware.php';

/**
 * Include Application
 */
include APP_PATH . '/config/autoloadRoutes.php';

/**
 * Handle the request
 */
$app->handle($_SERVER['REQUEST_URI']);