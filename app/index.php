<?php

require_once 'Database.php';
require_once 'Router.php';
require_once 'Controller.php';
require_once 'service/AuthService.php';
require_once 'repository/UserRepository.php';
require_once 'repository/PostRepository.php';
require_once 'repository/DraftRepository.php';
require_once 'repository/LikeRepository.php';
require_once 'repository/CommentRepository.php';

/* Model */
$db = new Database();

$userRepository = new UserRepository($db);
$postRepository = new PostRepository($db);
$draftRepository = new DraftRepository($db);
$likeRepository = new LikeRepository($db);
$commentRepository = new CommentRepository($db);

$authService = new AuthService($userRepository);

/* Controller */
$controller = new Controller($authService);

$router = new Router($controller);
$router->run();

?>