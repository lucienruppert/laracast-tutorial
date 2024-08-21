<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if (!$form->validate($email, $password)) {
  view('session/create.view.php', [
    'errors' => $form->errors()
  ]); 
}

$db = App::container()->resolve(Database::class);
$query = "select * from users where email = :email";
$user = $db->queryDB($query, [':email' => $email])->find();

if ($user && password_verify($password, $user['password'])) {
    login($user);
  }

view('session/create.view.php', [
  'errors' => [
    'password' => 'No user found with that email and password.'
  ]
]);
