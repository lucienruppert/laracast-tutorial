<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

  if ((new Authenticator())->attempt($email, $password))
    redirect('/');

  $form->error('email', 'No mathinc account found with that email and password.');
}

view('session/create.view.php', [
  'errors' => $form->errors(),
]);
