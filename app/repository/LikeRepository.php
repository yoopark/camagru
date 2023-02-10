<?php

require_once 'Database.php';
require_once 'model/entity/Like.php';
require_once 'model/dto/LikeCreationDTO.php';

class LikeRepository {

  private $db;
  private const TABLE = 'like_';

  function __construct(Database $db) {
    $this->db = $db;
  }

  private function getIdByUserIdAndPostId($user_id, $post_id) {
    // user_id - post_id 에 해당하는 like가 있는지 검사
    // 없으면 -1
  }

  function getIsLiked($user_id, $post_id) {
    $id = $this->getIdByUserIdAndPostId($user_id, $post_id);
    return $id !== -1;
  }

  function create(likeCreationDTO $likeCreationDTO) {
    $user_id = $likeCreationDTO->getUserId();
    $post_id = $likeCreationDTO->getPostId();
    
    $sql = "INSERT INTO ".self::TABLE." (user_id, post_id) VALUES (:user_id, :post_id)";
    $this->db->query($sql);
    $this->db->bind(":user_id", $user_id);
    $this->db->bind(":post_id", $post_id);
    return $this->db->execute();
  }

  function deleteByUserIdAndPostId($user_id, $post_id) {
    $id = $this->getIdByUserIdAndPostId($user_id, $post_id);
    if ($id === -1) {
      return;
    }
    $this->db->delete(self::TABLE, 'id', $id);
  }
}

?>