<?php

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