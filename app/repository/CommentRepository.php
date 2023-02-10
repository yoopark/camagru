<?php

require_once 'Database.php';
require_once 'model/entity/Comment.php';
require_once 'model/dto/CommentCreationDTO.php';

class CommentRepository {

  private $db;
  private const TABLE = 'comment';

  function __construct(Database $db) {
    $this->db = $db;
  }

  function findByPostId($post_id) {
    $result = $this->db->select(self::TABLE, 'post_id', $post_id);
    return new Comment(); // Array of Comments
  }

  function create(CommentCreationDTO $commentCreationDTO) {
    $user_id = $commentCreationDTO->getUserId();
    $post_id = $commentCreationDTO->getPostId();
    $text = $commentCreationDTO->getText();
    
    $sql = "INSERT INTO ".self::TABLE." (user_id, post_id, text) VALUES (:user_id, :post_id, :text)";
    $this->db->query($sql);
    $this->db->bind(":user_id", $user_id);
    $this->db->bind(":post_id", $post_id);
    $this->db->bind(":text", $text);
    return $this->db->execute();
  }

  function updateText($id, $text) {
    $this->db->update(self::TABLE, 'text', $text, 'id', $id);
  }

  function deleteById($id) {
    $this->db->delete(self::TABLE, 'id', $id);
  }  
}

?>