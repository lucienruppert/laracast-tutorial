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

if (!Validator::checkString($password, 3, 20)) {
  $errors['password'] = 'Please provide a password of at least 3 characters.';
}

if (!empty($errors)) {
  view('registration/create.view.php', [
    'errors' => $errors
  ]);
  die();
}

$db = App::container()->resolve(Database::class);

$query = "select * from users where email = :email";
$existingUser = $db->queryDB($query, [':email' => $email])->find();

if ($existingUser) {
  redirect('/');
} else {
  $query = "insert into users (email, password) values (:email, :password)";
  $db->queryDB($query, [
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT)
  ]);

  $userId = $db->lastInsertId();
  $query = "SELECT * FROM users WHERE id = :id";
  $user = $db->queryDB($query, [':id' => $userId])->find();
  login($user);

}
