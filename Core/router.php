<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  public $routes = [];

  public function add($uri, $controller, $method)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware'  => 'default',
    ];
    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->add($uri, $controller, 'GET');
  }

  public function post($uri, $controller)
  {
    return $this->add($uri, $controller, 'POST');
  }

  public function delete($uri, $controller)
  {
    return $this->add($uri, $controller, 'DELETE');
  }

  public function patch($uri, $controller)
  {
    return $this->add($uri, $controller, 'PATCH');
  }

  public function put($uri, $controller)
  {
    return $this->add($uri, $controller, 'PUT');
  }

  public function route(string $uri, string $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

        if ($route['middleware'] !== 'default') { 
          Middleware::resolve($route['middleware']);
        }

        return require base_path('/controllers/' . $route['controller']);
      }
    }
    abort();
  }

  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
  }
}
