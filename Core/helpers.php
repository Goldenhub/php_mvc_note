<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function abort($code)
{
    http_response_code($code);
    require(base_uri("controllers/{$code}.php"));
    die();
}

function getURIState($uri, $value){
    return $uri === $value ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
}

function authorize($condition, $response){
    if(!$condition){
        abort($response);
    }
}

function base_uri($path){
    return BASE_URI . $path;
}

function view($path, $attibute = []){
    extract($attibute);
    require '../views/' . $path;
}

