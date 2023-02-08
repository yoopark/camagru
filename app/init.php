<?php

$DB_HOST = getenv('DB_HOST');
$DB_PORT = getenv('DB_PORT');
$DB_NAME = getenv('DB_NAME');
$DB_USER = getenv('DB_USER');
$DB_PASSWORD = getenv('DB_PASSWORD');


$dsn = "mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME";

try {
  $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD);
  echo "Connected\n";
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>