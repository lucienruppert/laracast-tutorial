<?php

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
  require base_path("views/$code.view.php");
}

routeToController($uri, $routes);
