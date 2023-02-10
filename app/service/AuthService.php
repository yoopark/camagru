<?php

require_once 'repository/UserRepository.php';

class AuthService {
  
  private $userRepository;

  function __construct(UserRepository $userRepository) {
    $this->userRepository = $userRepository;
  }

  function signup() {
    session_start();
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