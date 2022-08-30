<?php

use Phalcon\Mvc\Micro;
use Phalcon\Http\Response as PhalconResponse;
use Phalcon\Mvc\Micro\MiddlewareInterface;

class Response implements MiddlewareInterface {

    /**
     * Calls the middleware
     *
     * @param Micro $application
     * @return bool
     */
    public function call(Micro $application){
        $returned = $application->getReturnedValue();
        $result = ['success' => false, 'message' => 'undefined', 'data' => []];
        if(is_string($returned)){
            $result['success'] = true;
            $result['message'] = $returned;
            $result['data'] = [];
        }else if(is_array($returned)){
            $result['success'] = $returned[0] ?? $returned['success'] ?? true;
            $result['message'] = $returned[1] ?? $returned['message'] ?? 'success';
            $result['data'] = $returned[2] ?? $returned['data'] ?? [];
        }
        $response = new PhalconResponse();
        $response->setJsonContent($result);
        $response->setStatusCode($returned[3] ?? $returned['code'] ?? 200);
        return $response->send();
    }
}