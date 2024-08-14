<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$currentUser = 5;

$query = "select * from notes where id = :id";
$note = $db->queryDB($query, [':id' => $_POST['id']])->findOrAbort();

authorize($note['user_id'] === $currentUser);

$query = "delete from notes where id = :id";
$db->queryDB($query, [':id' => $_POST['id']]);

header('location: /notes');
exit();
