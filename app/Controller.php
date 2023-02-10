<?php

require_once 'service/AuthService.php';

class Controller {
  private $authService;

  function __construct(AuthService $authService) {
    $this->authService = $authService;
  }

  function login() { $this->authService->login(); }
  function logout() { $this->authService->logout(); }

}

?>