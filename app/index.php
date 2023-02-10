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

$user_repository = new UserRepository($db);
$post_repository = new PostRepository($db);
$draft_repository = new DraftRepository($db);
$like_repository = new LikeRepository($db);
$comment_repository = new CommentRepository($db);

$auth_service = new AuthService($user_repository);

/* Controller */
$controller = new Controller($auth_service);

$router = new Router($controller);
$router->run();

?>