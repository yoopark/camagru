<?php

require_once 'service/AuthService.php';

class Controller {
  private $auth_service;

  function __construct(AuthService $auth_service) {
    $this->auth_service = $auth_service;
  }

  function signup() { $this->auth_service->signup(); }
  function login() { $this->auth_service->login(); }
  function logout() { $this->auth_service->logout(); }

}

?>