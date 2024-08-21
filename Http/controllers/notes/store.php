<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

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

redirect('/notes');
