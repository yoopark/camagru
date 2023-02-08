<?php

class Comment {
  private $id;
  private $user_id;
  private $post_id;
  private $text;
  private $creation_date;

  function __construct($id, $user_id, $post_id, $text, $creation_date) {
    $this->id = $id;
    $this->user_id = $user_id;
    $this->post_id = $post_id;
    $this->text = $text;
    $this->creation_date = $creation_date;
  }

  function getId() { return $this->id; }
  function getUserId() { return $this->user_id; }
  function getPostId() { return $this->post_id; }
  function getText() { return $this->text; }
  function getCreationDate() { return $this->creation_date; }
}

class CommentCreationDTO {
  private $user_id;
  private $post_id;
  private $text;

  function __construct($user_id, $post_id, $text) {
    $this->user_id = $user_id;
    $this->post_id = $post_id;
    $this->text = $text;
  }

  function getUserId() { return $this->user_id; }
  function getPostId() { return $this->post_id; }
  function getText() { return $this->text; }
}


?>