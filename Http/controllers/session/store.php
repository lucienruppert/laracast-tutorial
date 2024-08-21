<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if (!$form->validate($email, $password)) {
  view('session/create.view.php', [
    'errors' => $form->errors()
  ]); 
}

$auth = new Authenticator();
if($auth->attempt($email, $password)) {
  header('location: /');
  exit();
} else {
  view('session/create.view.php', [
    'errors' => [ 
      'password' => 'No user found with that email and password.'
    ]
  ]);
}

