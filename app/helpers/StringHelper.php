<?php

class StringHelper {

    /**
     * convert a text string to Snake CamelCase
     *
     * @author Michael Velasco <maicolvelasco55@gmail.com>
     * @param string $txt
     * @param boolean $hard
     * @return string
     */
    public static function stringToSnakeCase(string $txt, bool $hard = false){
        return $hard ?
            ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $txt)), '_') :
            strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $txt)) ;
    }
}