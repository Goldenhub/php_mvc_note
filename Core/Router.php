<?php

namespace Core;

class Router
{
    public $routes = [];
    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }
    
    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }
    

    public function route($uri, $method)
    {
        $method = strtoupper($method);
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                exit(require base_uri($route['controller']));
            }
        }
        $this->abort(Response::NOT_FOUND);
    }

    public function add($method, $uri, $controller)
    {

        $this->routes[] = compact('method', 'uri', 'controller');
    }

    public function abort($code)
    {
        http_response_code($code);
        require(base_uri("controllers/{$code}.php"));
        die();
    }
}
