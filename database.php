<?php

$server = 'localhost:8889';
$username = 'root';
$password = 'root';
$database = 'usuarios_wiedii';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>
