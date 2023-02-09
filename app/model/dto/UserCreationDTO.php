<?php

class UserCreationDTO {
  private $username;
  private $password;
  private $email;

  function __construct($username, $password, $email) {
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
  }

  function getUsername() { return $this->username; }
  function getPassword() { return $this->password; }
  function getEmail() { return $this->email; }
}

?>