<?php

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function runRouter(string $uri, array $routes): void
{
  if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
  } else {
    http_response_code(404);
    require base_path('controllers/index.controller.php');
  };
}

runRouter($uri, $routes);
