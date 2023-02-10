<?php

require_once 'repository/UserRepository.php';
require_once 'model/dto/UserCreationDTO.php';

class AuthService {
  
  private $user_repository;

  function __construct(UserRepository $user_repository) {
    $this->user_repository = $user_repository;
  }

  function signup() {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_creation_dto = new UserCreationDTO($username, $password, $email);
    $this->user_repository->create($user_creation_dto);
  }

  function login() {
    session_start();
    echo $_POST['username'];
    echo $_POST['password'];
    $_SESSION['user_id'] = 4242;
  }

  function logout() {
    session_start();
    session_destroy();
  }

}

?>