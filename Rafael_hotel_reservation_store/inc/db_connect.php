<?php
// Connect to the database using PDO
$db_host = 'localhost';
$db_user = 'rafaelhidalgo';
$db_pass = 'rafaelhidalgopass';
$db_name = 'rafaelhidalgodatabase';

try {
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Database connected successfully.";
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
