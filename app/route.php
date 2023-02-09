<?php

require 'Router.php';

$router = new Router();

/* Frontend */
$router->get('/', 'view/page/index.php');
$router->get('/login', 'view/page/login.php');
$router->get('/signup', 'view/page/signup.php');
$router->get('/camera', 'view/page/camera.php');
$router->get('/settings', 'view/page/settings.php');


/* Backend */
$router->get('/api/user', function() {});
$router->post('/api/user', function() {});
$router->patch('/api/user', function() {});
$router->delete('/api/user', function() {});
$router->post('/api/login', function() {});
$router->post('/api/logout', function() {});

$router->get('/api/post/new', function() {});
$router->get('/api/post', function() {});
$router->post('/api/post', function() {});
$router->patch('/api/post', function() {});
$router->delete('/api/post', function() {});

$router->get('/api/draft/me', function() {});
$router->post('/api/draft', function() {});
$router->delete('/api/draft', function() {});

$router->get('/api/comment', function() {});
$router->post('/api/comment', function() {});
$router->patch('/api/comment', function() {});
$router->delete('/api/comment', function() {});

$router->get('/api/like', '');
$router->post('/api/like', '');
$router->delete('/api/like', '');

$router->run();

?>