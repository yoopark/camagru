<?php

class User {
  private $id;
  private $username;
  private $password;
  private $email;
  private $email_verified;
  private $email_notification;

  function __construct($id, $username, $password, $email, $email_verified, $email_notification) {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
    $this->email_verified = $email_verified;
    $this->email_notification = $email_notification;
  }

  function getId() { return $this->id; }
  function getUsername() { return $this->username; }
  function getPassword() { return $this->password; }
  function getEmail() { return $this->email; }
  function getEmailVerified() { return $this->email_verified; }
  function getEmailNotification() { return $this->email_notification; }
}

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