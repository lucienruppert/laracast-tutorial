<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

//$id = $_GET['id'];
$id = 5;
$query = "select * from notes where user_id = :id";
$notes = $db->queryDB($query, [':id' => $id])->fetchAll();

view('notes.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes,
]);
