<?php

function getStyleForActive($uri)
{
  return $_SERVER['REQUEST_URI'] === $uri ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
}

function dd($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
  extract($attributes);
  require base_path("views/$path");
}

function authorize($condition, $status = Response::FORBIDDEN) {
  if(!$condition) {
    abort($status);
  }
}