<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = 5;
$query = "select * from notes where user_id = :id";
$notes = $db->queryDB($query, [':id' => $id])->get();

view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes,
]);
