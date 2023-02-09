<?php

class Database {
  private static $pdo = null;
  private $stmt;

  public function __construct() {
    if (self::$pdo) {
      return;
    }
    $host = getenv('DB_HOST');
    $port = getenv('DB_PORT');
    $name = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
  
    $dsn = "mysql:host=$host;port=$port;dbname=$name";

    try {
      self::$pdo = new PDO($dsn, $user, $password);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage(); // TODO: Error 페이지 만들기
    }
  }

  function query($sql) {
    $this->stmt = self::$pdo->prepare($sql);
  }

  function bind($param, $value, $type = null) {
    if (is_null($type)) {
      switch(true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  function execute() {
    return $this->stmt->execute();
  }

  function fetchAll() {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  function select($table, $param, $value) {
    $sql = "SELECT * FROM $table WHERE $param=:$param";
    $this->query($sql);
    $this->bind(":$param", $value);
    return $this->fetch_all();
  }

  function update($table, $set_param, $set_value, $param, $value) {
    $sql = "UPDATE $table SET $set_param=:$set_param WHERE $param=:$param";
    $this->bind(":$set_param", $set_value);
    $this->bind(":$param", $value);
    return $this->execute();
  }

  function delete($table, $param, $value) {
    $sql = "DELETE * FROM $table WHERE $param=:$param";
    $this->bind(":$param", $value);
    return $this->execute();
  }
}

?>