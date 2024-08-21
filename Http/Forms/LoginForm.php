<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected $errors = [];

  public function validate($email, $password)
  {
    if (!Validator::checkEmail($email)) {
      $this->errors['email'] = 'Please provide a valid email address.';
    }

    if (!Validator::checkString($password)) {
      $this->errors['password'] = 'Please provide a valid password.';
    }

    return empty($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }
  
}
