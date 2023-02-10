<?php

require_once 'Controller.php';

class Router {
  private array $handlers;
  private Controller $controller;

  private const METHOD_GET = 'GET';
  private const METHOD_POST = 'POST';
  private const METHOD_PATCH = 'PATCH';
  private const METHOD_PUT = 'PUT';
  private const METHOD_DELETE = 'DELETE';

  function __construct(Controller $controller) {
    $this->controller = $controller;

    $this->get('/', 'view/page/index.php');
    $this->get('/login', 'view/page/login.php');
    $this->get('/signup', 'view/page/signup.php');
    $this->get('/camera', 'view/page/camera.php');
    $this->get('/settings', 'view/page/settings.php');
    
    $this->get('/api/user', function() {});
    $this->post('/api/user', function() { $this->controller->signup(); });
    $this->put('/api/user', function() {});
    $this->delete('/api/user', function() {});
    $this->post('/api/login', function() { $this->controller->login(); });
    $this->get('/api/logout', function() { $this->controller->logout(); }); // TODO: GET -> POST로 변경
    
    $this->get('/api/post/new', function() {});
    $this->get('/api/post', function() {});
    $this->post('/api/post', function() {});
    $this->patch('/api/post', function() {});
    $this->delete('/api/post', function() {});
    
    $this->get('/api/draft/me', function() {});
    $this->post('/api/draft', function() {});
    $this->delete('/api/draft', function() {});
    
    $this->get('/api/comment', function() {});
    $this->post('/api/comment', function() {});
    $this->patch('/api/comment', function() {});
    $this->delete('/api/comment', function() {});
    
    $this->get('/api/like', function() {});
    $this->post('/api/like', function() {});
    $this->delete('/api/like', function() {});   
  }
  
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