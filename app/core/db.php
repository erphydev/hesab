<?php
$config = require __DIR__ . '/../../config/config.php';

try {
	$pdo = new PDO(
		"mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8mb4",
		$config['db_user'],
		$config['db_pass'],
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
	);
} catch (PDOException $e) {
	die("خطا در اتصال به دیتابیس: " . $e->getMessage());
}
