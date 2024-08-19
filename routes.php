<?php

$router = new Core\Router();

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php');
$router->get('/notes/create', 'notes/create.php'); 
$router->post('/notes', 'notes/store.php'); 

$router->get('/note', 'notes/show.php');
$router->get('/note/edit', 'notes/edit.php');
$router->delete('/note', 'notes/destroy.php');
$router->patch('/note', 'notes/update.php');

$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');
