<?php

namespace Core;

class Validator {
    public static function string($string, $min, $max){
        $string = trim($string);

        return (strlen($string) > $min) && (strlen($string) < $max);
    }
}