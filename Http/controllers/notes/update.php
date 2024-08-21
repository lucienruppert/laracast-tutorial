<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser = 5;

$query = "select * from notes where id = :id"; 
$note = $db->queryDB($query, [':id' => $_POST['id']])->findOrAbort();

authorize($note['user_id'] === $currentUser);

$errors = [];

if (!Validator::checkString($_POST['body'], 1, 50)) {
  $errors['body'] = 'A note has to be between 1 and 10 characters.';
}

if (!empty($errors)) {
  view('notes/edit.view.php', [
    'heading' => 'Edit a new note',
    'note' => $note,
    'errors' => $errors ?? [],
  ]);
  die();
}

$query = "update notes set body = :body where id = :id";
$note = $db->queryDB($query, [':id' => $_POST['id'],':body' => $_POST['body']]);

header('location: /notes');
exit();

