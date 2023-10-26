<?php

namespace Core;

class App {

    protected static $container;

    public static function setContainer($container){
        static::$container = $container;
    }

    public static function container(){
        return static::$container;
    }

    public static function resolver($key){
        return static::container()->resolver($key);
    }

    public static function bind($key, $value){
        static::container()->bind($key, $value);
    }
}