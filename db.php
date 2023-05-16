<?php
// Database connection settings
$host = 'localhost';
$dbname = 'chatbox';
$username = 'root';
$password = '';

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  // echo "Connected";
} catch (PDOException $e) {
  echo "Error connecting to database: " . $e->getMessage();
  exit();
}
