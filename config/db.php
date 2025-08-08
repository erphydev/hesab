<?php

global $conn;

$config = require __DIR__ . '/../../config/config.php';

$servername = $config['DB_HOST'];
$dbname     = $config['DB_NAME'];
$username   = $config['DB_USER'];
$password   = $config['DB_PASS'];

try {
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
	];
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
