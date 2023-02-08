<?php

require_once 'repository/Database.php';
require_once 'dto/Draft.php';

class DraftRepository {

  private $db;
  private $TABLE = 'draft';

  function __construct(Database $db) {
    $this->db = $db;
  }

  function findByUserId($user_id) {
    $result = $this->db->select($this->TABLE, 'user_id', $user_id);
    return new Draft(); // Array of Drafts
  }

  function create(DraftCreationDTO $draftCreationDTO) {
    $user_id = $draftCreationDTO->getUserId();
    $image_url = $draftCreationDTO->getImageUrl();
    
    $sql = "INSERT INTO $this->TABLE (user_id, image_url) VALUES (:user_id, :image_url)";
    $this->db->query($sql);
    $this->db->bind(":user_id", $user_id);
    $this->db->bind(":image_url", $image_url);
    return $this->db->execute();
  }

  function deleteById($id) {
    $this->db->delete($this->TABLE, 'id', $id);
  }  
}

?>