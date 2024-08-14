<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if (!Validator::checkString($_POST['body'], 1, 50)) {
  $errors['body'] = 'A note has to be between 1 and 10 characters.';
}

if (!empty($errors)) {
  view('notes/create.view.php', [
    'heading' => 'Create a new note',
    'errors' => $errors ?? [],
  ]);
  die();
}

$db->queryDB('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
  ':user_id' => 5,
  ':body' => $_POST['body'],
]);

header('location: /notes');
die();
