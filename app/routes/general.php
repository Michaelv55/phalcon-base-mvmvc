<?php

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */
$app;

$app->get('/', function () use ($app) {
    return [
        'success' => true,
        'message' => 'Route List',
        'data' => array_map(function($value){
            return [
                'group' => $value->getGroup(),
                'compiledPattern' => $value->getCompiledPattern(),
                'httpMethods' => $value->getHttpMethods(),
                'name' => $value->getName(),
            ];
        }, $app->router->getRoutes())
    ];
});

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app
        ->response
        ->setStatusCode(404, "Not Found")
        ->setJsonContent([
            'success' => false,
            'message' => 'Route '.$app->request->getServer('REQUEST_URI').' Not Found',
            'data' => []
        ])->send();
});
