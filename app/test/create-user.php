<?php 
require_once 'repository/UserRepository.php';
require_once 'dto/User.php';

$db = new Database();
$user_repository = new UserRepository($db);
$user_creation_dto = new UserCreationDTO('yopark2', 'yopark', 'yopark2@student.42seoul.kr');

$result = $user_repository->create($user_creation_dto);
echo $result;
?>