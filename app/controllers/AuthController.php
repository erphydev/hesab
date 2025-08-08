<?php
// sign up controller
class AuthController {
	private $usermodel;

	public function __construct() {
		$this->usermodel = new User();
	}

	public function register($username , $name ,  $email , $phone_number , $password  ) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = trim ($_POST['username']);
			$name = trim ($_POST['name']);
			$email = trim ($_POST['email']);
			$phone_number = trim ($_POST['phone_number']);
			$password = trim ($_POST['password']);

			if ($this->usermodel->register($username, $name, $email, $phone_number, $password)) {
				$message = "ثبت ‌نام موفق!";
			} else {
				$error = "خطا در ثبت‌نام!";

			}
		}
	}
	public function login() {}
	public function logout() {}

}