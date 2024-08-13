<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!Validator::checkString($_POST['body'], 1, 10)) {
    $errors['body'] = 'A note has to be between 1 and 10 characters.';
  }

  if (empty($errors)) {
    $db->queryDB('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)', [
      ':user_id' => 5,
      ':body' => $_POST['body'],
    ]);
  }
}

view('notes/create.view.php', [
  'heading' => 'Create a new note',
  'errors' => $errors ?? [],
]);
