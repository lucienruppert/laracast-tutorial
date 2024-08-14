<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$query = "insert into users (email, password) values (:email, :password)";
$db->queryDB($query, [
  ':email' => $email,
  ':password' => $password
]);

$userId = $db->lastInsertId();
$query = "SELECT * FROM users WHERE id = :id";
$user = $db->queryDB($query, [':id' => $userId])->find();

$_SESSION['user'] = $user;
header('location: /');