<?php

//use Core\Router;

return [
  '/' => '/controllers/index.controller.php',
  '/notes' => '/controllers/notes/index.controller.php',
  '/notes/create' => '/controllers/notes/create.controller.php',
  '/note' => '/controllers/notes/show.controller.php',
  '/about' => '/controllers/about.controller.php',
  '/contact' => '/controllers/contact.controller.php',
  '/register'=> '/controllers/registration.controller.php',
  '/store' => '/controllers/store.controller.php',
];

// $router->get('/', '/controllers/index.controller.php');
// $router->get('/notes', '/controllers/notes/index.controller.php');
// $router->get('/notes/create', '/controllers/notes/create.controller.php');
// $router->get('/note', '/controllers/notes/show.controller.php');
// $router->get('/about', '/controllers/about.controller.php');
// $router->get('/contact', '/controllers/contact.controller.php');
// $router->get('/register', '/controllers/registration.controller.php');
// $router->get('/store', '/controllers/store.controller.php');