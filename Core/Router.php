<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router
{
    public $routes = [];
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        $method = strtoupper($method);
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }
                exit(require base_uri($route['controller']));
            }
        }
        $this->abort(Response::NOT_FOUND);
    }

    public function add($method, $uri, $controller, $middleware = null)
    {

        $this->routes[] = compact('method', 'uri', 'controller', 'middleware');

        return $this;
    }

    public function abort($code)
    {
        http_response_code($code);
        require(base_uri("controllers/{$code}.php"));
        die();
    }
}
