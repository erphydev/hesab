
<?php
require_once __DIR__ . '/../core/db.php';

class User {
	private $conn;
	private $table = 'user';

	public function __construct(PDO $db) {
		$this->conn = $db;
	}
	public function signup($username , $fullname , $email , $phoneNumber , $password ) {
		$hashed_password = password_hash($password,PASSWORD_DEFAULT);
		$sql = "INSERT INTO users SET username=?, name = ? , email=?, phonenumber=?, password=? ,created_at=now()";
		global $conn;
		$stmt = $conn->prepare($sql);
		$stmt->execute([$username , $fullname , $email , $phoneNumber , $password]);
	}

	

}
