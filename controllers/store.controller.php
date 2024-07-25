<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$email = $_POST['email'];
$password = $_POST['password'];
$query = "insert into users (email, password) values (:email, :password)";
$db->queryDB($query, [
  ':email' => $email,
  ':password' => $password
]);

$userId = $db->lastInsertId();
$query = "SELECT * FROM users WHERE id = :id";
$user = $db->queryDB($query, [':id' => $userId])->fetch();

$_SESSION['user'] = $user;
header('location: /');