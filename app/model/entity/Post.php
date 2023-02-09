<?php

class Post {
  private $id;
  private $user_id;
  private $image_url;
  private $description;
  private $likes;
  private $comments;
  private $creation_date;

  function __construct($id, $user_id, $image_url, $description, $likes, $comments, $creation_date) {
    $this->id = $id;
    $this->$user_id = $user_id;
    $this->$image_url = $image_url;
    $this->$description = $description;
    $this->$likes = $likes;
    $this->$comments = $comments;
    $this->$creation_date = $creation_date;
  }

  function getId() { return $this->id; }
  function getUserId() { return $this->user_id; }
  function getImageUrl() { return $this->image_url; }
  function getDescription() { return $this->description; }
  function getLikes() { return $this->likes; }
  function getComments() { return $this->comments; }
  function getCreationDate() { return $this->creation_date; }
}

?>