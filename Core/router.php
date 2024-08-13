<?php

// class Router {
//   protected $routes = [];

//   public function get($uri, $controller) {
//     $this->routes[] = [
//       'uri' => $uri,
//       'controller' => $controller,
//       'method' => 'GET'
//     ];

//   }

//   public function post($uri, $controller)  {
//     $this->routes[] = [
//       'uri' => $uri,
//       'controller' => $controller,
//       'method' => 'POST'
//     ];
//   }
//   public function delete($uri, $controller) {
//     $this->routes[] = [
//       'uri' => $uri,
//       'controller' => $controller,
//       'method' => 'DELETE'
//     ];
//   }
//   public function patch($uri, $controller)  {
//     $this->routes[] = [
//       'uri' => $uri,
//       'controller' => $controller,
//       'method' => 'PATCH'
//     ];
//   }
//   public function put($uri, $controller) {
//     $this->routes[] = [
//       'uri' => $uri,
//       'controller' => $controller,
//       'method' => 'PUT'
//     ];
//   }
// }

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToController(string $uri, array $routes): void
{
  if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
  } else {
    abort();
  };
}

function abort($code = Response::NOT_FOUND): void
{
  http_response_code($code);
  view("$code.view.php");
}

routeToController($uri, $routes);
