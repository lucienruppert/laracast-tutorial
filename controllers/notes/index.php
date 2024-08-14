<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = 5;
$query = "select * from notes where user_id = :id";
$notes = $db->queryDB($query, [':id' => $id])->get();

view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes,
]);
