<?php

class Like {
  private $id;
  private $user_id;
  private $post_id;
  private $creation_date;

  function __construct($id, $user_id, $post_id, $creation_date) {
    $this->id = $id;
    $this->user_id = $user_id;
    $this->post_id = $post_id;
    $this->creation_date = $creation_date;
  }

  function getId() { return $this->id; }
  function getUserId() { return $this->user_id; }
  function getPostId() { return $this->post_id; }
  function getCreationDate() { return $this->creation_date; }
}

?>