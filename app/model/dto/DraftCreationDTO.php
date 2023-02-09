<?php

class DraftCreationDTO {
  private $user_id;
  private $image_url;

  function __construct($user_id, $image_url) {
    $this->user_id = $user_id;
    $this->image_url = $image_url;
  }

  function getUserId() { return $this->user_id; }
  function getImageUrl() { return $this->image_url; }
}

?>