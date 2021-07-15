<?php

class RouterActions{

    public static $_RContainer = [];

    /**
     * Add all routes (Check Web.php) in the array self::$getList
     * 
     * @param string $routeName
     * @param array $data
     * @return void
     */
    public static function get($route,$data){

        self::$_RContainer[$route] = $data;

    }

}