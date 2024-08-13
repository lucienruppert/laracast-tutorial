<?php

$router = new Core\Router();

$router->get('/', '/controllers/index.controller.php');
$router->get('/about', '/controllers/about.controller.php');
$router->get('/contact', '/controllers/contact.controller.php');

$router->get('/notes', '/controllers/notes/index.controller.php');
$router->get('/note', '/controllers/notes/show.controller.php');
$router->get('/notes/create', '/controllers/notes/create.controller.php');
$router->post('/notes/create', '/controllers/notes/create.controller.php');

$router->get('/register', '/controllers/registration.controller.php');
$router->post('/store', '/controllers/store.controller.php');
$router->delete('/note', '/controllers/notes/destroy.controller.php');