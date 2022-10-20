<?php

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */
$app;

class AutoloadRoutes{

    public function __construct(\Phalcon\Mvc\Micro $app){
        $this->load($app->config->directories->routes, $app);
    }

    private function load($path = __DIR__, ?\Phalcon\Mvc\Micro $app = null){
        $directories = array_diff(scandir($path), ['.', '..', 'autoload.php']);
        foreach ($directories as $key => $value) {
            $directory = $path.DIRECTORY_SEPARATOR.$value;
            if(is_dir($directory)){
                $this->load($directory, $app);
            }else{
                include $directory;
            }
        }
    }

}

new AutoloadRoutes($app);