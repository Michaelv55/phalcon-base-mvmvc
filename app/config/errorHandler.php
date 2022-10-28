<?php

error_reporting(E_ALL);

set_error_handler(function(int $errno, string $errstr, string $errfile, int $errline, array $errcontext){
    SystemErrorCatcher::addError($errno, $errstr, $errfile, $errline, $errcontext);
},  E_WARNING | E_USER_WARNING | E_CORE_WARNING | E_CORE_WARNING);

set_exception_handler(function($exception){
    $micro = new \Phalcon\Mvc\Micro(new Phalcon\Di\FactoryDefault());
    $micro
        ->response
        ->setStatusCode($exception->getCode() > 0 ? $exception->getCode() : 500)
        ->setJsonContent([
            'success' => false,
            'message' => 'Exception not controlled: '.$exception->getMessage(),
            'data' => $exception->getTraceAsString(),
            // 'data' => $exception->getTrace(),
            'errors' => SystemErrorCatcher::getErrors()
        ])->send();
});

/**
 * Handler and/or container of errors occurred in the application
 */
class SystemErrorCatcher {

    const TYPE_WARNING = 'warnings';
    const TYPE_ALERT = 'alerts';
    const TYPE_OTHER = 'others';
    const ALL = 'all';

    private static $container = [
      'warnings' => [],
      'alerts' => [],
      'others' => [],
    ];

    public static function addError(string $type, string $errstr, string $errfile, int $errline, array $errcontext){
        $data = [
            'errstr' => $errstr,
            'errfile' => $errfile,
            'errline' => $errline,
            'errcontext' => $errcontext,
        ];
        if(in_array($type, [self::TYPE_ALERT, self::TYPE_WARNING])){
            self::$container[$type] = $data;
        } else {
            self::$container[self::TYPE_OTHER] = $data;
        }

    }

    public static function getErrors($type = self::ALL){
        if($type == self::ALL){
            return self::$container;
        }
        return self::$container[$type];
    }

}
