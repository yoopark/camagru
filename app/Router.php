<?php

class Router {
  private array $handlers;

  private const METHOD_GET = 'GET';
  private const METHOD_POST = 'POST';
  private const METHOD_PATCH = 'PATCH';
  private const METHOD_PUT = 'PUT';
  private const METHOD_DELETE = 'DELETE';
  
  function get(string $path, $handler) {
    $this->addHandler(self::METHOD_GET, $path, $handler);
  }

  function post(string $path, $handler) {
    $this->addHandler(self::METHOD_POST, $path, $handler);
  }

  function patch(string $path, $handler) {
    $this->addHandler(self::METHOD_PATCH, $path, $handler);
  }

  function put(string $path, $handler) {
    $this->addHandler(self::METHOD_PUT, $path, $handler);
  }

  function delete(string $path, $handler) {
    $this->addHandler(self::METHOD_DELETE, $path, $handler);
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

?>