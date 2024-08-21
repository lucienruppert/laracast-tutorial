<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUser = 5;

$query = "select * from notes where id = :id";
$note = $db->queryDB($query, [':id' => $_POST['id']])->findOrAbort();

authorize($note['user_id'] === $currentUser);

$query = "delete from notes where id = :id";
$db->queryDB($query, [':id' => $_POST['id']]);

redirect('/notes');
