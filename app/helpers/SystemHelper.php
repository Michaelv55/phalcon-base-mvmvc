<?php

use Phalcon\Di;

class SystemHelper {

    /**
     * get configuration defined in files config
     *
     * @author Michael Velasco <maicolvelasco55@gmail.com>
     * @param string $config
     * @param mixed $default
     * @param boolean $phalconConfig
     * @return mixed
     */
    public static function getConfig(string $config, mixed $default = null, bool $phalconConfig = false) {
        $diConfig = Di::getDefault()->get($phalconConfig ? 'config' : 'configuration');
        return !is_null($confg = $diConfig->{$config}) ? $confg : $default;
    }

}