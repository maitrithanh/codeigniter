<?php

class LoginModel extends CI_Model
{
  public function __construct()
  {
  }

  public function checkLogin($email, $password)
  {
    $query = $this->db->where("email", $email)->where("password", $password)->get('users');
    return $query->result();
  }

}