<?php

class WelcomeController{

    public function index(){
        return [
            'success' => true,
            'message' => 'welcome to phalcon user!',
            'data' => [],
            'code' => 200
        ];
    }

}