<?php

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */
$app;

class AutoloadRoutes{

    public function __construct($context = null){
        $this->load($context->config->application->routesDir, $context);
    }

    private function load($path = __DIR__, $context = null){
        $app = $context;
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