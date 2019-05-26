<?php
$servername = 'localhost';
$username = 'root';
$password = '';

$pdo = null;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=cipurza", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}