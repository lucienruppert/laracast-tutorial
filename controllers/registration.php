<?php

if($_SESSION['user']) {
  header('location: /');
  exit();
}

view('registration.view.php', [
  'heading' => 'Registration'
]);