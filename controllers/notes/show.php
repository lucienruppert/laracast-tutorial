<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = 5;

$query = "select * from notes where id = :id";
$note = $db->queryDB($query, [':id' => $_GET['id']])->findOrAbort();

authorize($note['user_id'] === $currentUser);

view('notes/show.view.php', [
  'heading' => 'My Note',
  'note' => $note,
]);
