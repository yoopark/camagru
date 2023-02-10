<?php

class PostCreationDTO {
  private $user_id;
  private $image_url;
  private $description;

  function __construct($user_id, $image_url, $description) {
    $this->user_id = $user_id;
    $this->image_url = $image_url;
    $this->description = $description;
  }

  function getUserId() { return $this->user_id; }
  function getImageUrl() { return $this->image_url; }
  function getDescription() { return $this->description; }
}

?>