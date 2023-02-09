<?php

require_once 'Database.php';
require_once 'model/entity/Post.php';
require_once 'model/dto/PostCreationDTO.php';

class PostRepository {

  private $db;
  private const TABLE = 'post';

  function __construct(Database $db) {
    $this->db = $db;
  }

  function getFromNewest($from, $to) {
    $sql = "SELECT * FROM ... BETWEEN :from AND :to";
    $sql->db->query($sql);
    $this->db->bind(":from", $from);
    $this->db->bind(":to", $to);
    $result = $this->db->fetchAll();
    return new Post(); // Array of Post
  }

  function create(PostCreationDTO $commentCreationDTO) {
    $user_id = $postCreationDTO->getUserId();
    $image_url = $postCreationDTO->getImageUrl();
    $description = $postCreationDTO->getDescription();
    
    $sql = "INSERT INTO self::TABLE (user_id, image_url, description) VALUES (:user_id, :image_url, :description)";
    $this->db->query($sql);
    $this->db->bind(":user_id", $user_id);
    $this->db->bind(":image_url", $image_url);
    $this->db->bind(":description", $description);
    return $this->db->execute();
  }

  function updateDescription($id, $description) {
    $this->db->update(self::TABLE, 'description', $description, 'id', $id);
  }

  function deleteById($id) {
    $this->db->delete(self::TABLE, 'id', $id);
  }  
}

?>