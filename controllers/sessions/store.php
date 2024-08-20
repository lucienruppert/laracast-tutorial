<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::checkEmail($email)) {
  $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::checkString($password)) {
  $errors['password'] = 'Please provide a valid password.';
}

if (!empty($errors)) {
  view('sessions/create.view.php', [
    'errors' => $errors
  ]);
  die();
}

$db = App::container()->resolve(Database::class);

$query = "select * from users where email = :email";
$user = $db->queryDB($query, [':email' => $email])->find();

if ($user && password_verify($password, $user['password'])) {
    login($user);
  }

view('sessions/create.view.php', [
  'errors' => [
    'password' => 'No user found with that email and password.'
  ]
]);
