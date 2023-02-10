<?php

require_once 'Database.php';
require_once 'model/entity/User.php';
require_once 'model/dto/UserCreationDTO.php';

class UserRepository {

  private $db;
  private const TABLE = 'user';

  function __construct(Database $db) {
    $this->db = $db;
  }

  function findById($id) {
    $result = $this->db->select(self::TABLE, 'id', $id);
    return new User(); // Array of Users
  }

  function create(UserCreationDTO $userCreationDTO) {
    $username = $userCreationDTO->getUsername();
    $password = $userCreationDTO->getPassword();
    $email = $userCreationDTO->getEmail();
    
    $sql = "INSERT INTO ".self::TABLE." (username, password, email) VALUES (:username, :password, :email)";
    $this->db->query($sql);
    $this->db->bind(":username", $username);
    $this->db->bind(":password", $password);
    $this->db->bind(":email", $email);
    return $this->db->execute();
  }

  function updateUsername($id, $username) {
    $this->db->update(self::TABLE, 'username', $username, 'id', $id);
  }

  function updatePassword($id, $password) {
    $this->db->update(self::TABLE, 'password', $password, 'id', $id);
  }

  function updateEmail($id, $email) {
    $this->db->update(self::TABLE, 'email', $email, 'id', $id);
  }

  function updateEmailVerified($id, $email_verified) {
    $this->db->update(self::TABLE, 'email_verified', $email_verified, 'id', $id);
  }

  function updateEmailNotification($id, $email_notification) {
    $this->db->update(self::TABLE, 'email_notification', $email_notification, 'id', $id);
  }

  function deleteById($id) {
    $this->db->delete(self::TABLE, 'id', $id);
  }  
}

?>