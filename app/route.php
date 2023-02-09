<?php

class Router {
  private array $handlers;

  private const METHOD_GET = 'GET';
  private const METHOD_POST = 'POST';
  
  function get(string $path, $handler) {
    $this->addHandler(self::METHOD_GET, $path, $handler);
  }

  function post(string $path, $hanlder) {
    $this->addHandler(self::METHOD_POST, $path, $handler);
  }

  private function addHandler(string $method, string $path, $handler) {
    $this->handlers["$method $path"] = $handler;
  }

  function run() {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'])['path'];

    if (array_key_exists("$method $path", $this->handlers)) {
      $value = $this->handlers["$method $path"];
      if (is_string($value)) {
        require $value;
      } else if (is_callable($value)) {
        call_user_func($value);
      }
    } else {
      self::abort();
    }
  }

  private function abort($code = 404) {
    http_response_code($code);
    require "view/page/$code.php";
    die();
  }
  
}

$router = new Router();
$router->get('/', 'view/page/index.php');

$router->run();
