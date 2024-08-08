<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$query = "select * from notes where id = :id";
$note = $db->queryDB($query, [':id' => $_GET['id']])->findOrAbort();

$currentUser = 5;

authorize($note['user_id'] === $currentUser);

view('notes/show.view.php', [
  'heading' => 'My Note',
  'note' => $note,
]);
