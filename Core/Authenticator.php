<?php

namespace Core;

class Authenticator
{

  public function attempt($email, $password)
  {
    $db = App::container()->resolve(Database::class);
    $query = "select * from users where email = :email";
    $user = $db->queryDB($query, [':email' => $email])->find();

    if ($user && password_verify($password, $user['password'])) {
      $this->login($user);
      return true;
    }
    return false;
  }

  public function login($user)
  {
    $_SESSION['user'] = $user;
    session_regenerate_id(true);
    redirect('/');
  }

  public function logout()
  {
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
    redirect('/');
  }
}
