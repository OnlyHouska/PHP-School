<?php
$host    = 'localhost';
$db      = 'catalogue';
$user    = 'root';
$pass    = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("There was an error when connecting to the database: " . $e->getMessage());
}
?>
