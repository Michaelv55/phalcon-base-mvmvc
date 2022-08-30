<?php

error_reporting(E_ALL);

set_error_handler(function(int $errno, string $errstr, string $errfile, int $errline, array $errcontext){
    exit('aaaaaaaaa');
},  E_ALL | E_STRICT);

set_exception_handler(function($exception){
    $micro = new \Phalcon\Mvc\Micro(new Phalcon\Di\FactoryDefault());
    $micro
        ->response
        ->setStatusCode($exception->getCode() > 0 ? $exception->getCode() : 500)
        ->setJsonContent([
            'success' => false,
            'message' => 'Exception not controlled: '.$exception->getMessage(),
            'data' => $exception->getTrace()
        ])->send();
});