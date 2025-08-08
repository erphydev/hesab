<?php
// ⚡ نمایش خطاها در حالت توسعه
ini_set('display_errors', 1);
error_reporting(E_ALL);

$errors = [];
$success = false;

// وقتی فرم ارسال شده
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$db_host = $_POST['db_host'] ?? 'localhost';
	$db_name = $_POST['db_name'] ?? 'hesabjie';
	$db_user = $_POST['db_user'] ?? 'root';
	$db_pass = $_POST['db_pass'] ?? '';

	$username = trim($_POST['username'] ?? '');
	$name = trim($_POST['name'] ?? '');
	$email = trim($_POST['email'] ?? '');
	$phonenumber = trim($_POST['phonenumber'] ?? '');
	$password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);

	try {
		// اتصال اولیه برای ساخت دیتابیس
		$pdo = new PDO("mysql:host=$db_host", $db_user, $db_pass, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]);
		$pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
		$pdo->exec("USE `$db_name`");

		// جدول users
		$pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL UNIQUE,
            phonenumber VARCHAR(15) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            otp VARCHAR(10) NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

		// جدول دسته‌بندی درآمد
		$pdo->exec("
        CREATE TABLE IF NOT EXISTS income_categories (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            title VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

		// جدول دسته‌بندی مخارج
		$pdo->exec("
        CREATE TABLE IF NOT EXISTS expense_categories (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            title VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

		// جدول تراکنش‌های ورودی
		$pdo->exec("
        CREATE TABLE IF NOT EXISTS income_transactions (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            category_id INT UNSIGNED NOT NULL,
            title VARCHAR(255) NOT NULL,
            amount DECIMAL(15,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (category_id) REFERENCES income_categories(id) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

		// جدول تراکنش‌های خروجی
		$pdo->exec("
        CREATE TABLE IF NOT EXISTS expense_transactions (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            category_id INT UNSIGNED NOT NULL,
            title VARCHAR(255) NOT NULL,
            necessary TINYINT(1) NOT NULL DEFAULT 0,
            amount DECIMAL(15,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (category_id) REFERENCES expense_categories(id) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

		// درج کاربر مدیر
		$stmt = $pdo->prepare("INSERT INTO users (username, name, email, phonenumber, password) VALUES (?, ?, ?, ?, ?)");
		$stmt->execute([$username, $name, $email, $phonenumber, $password]);
		$user_id = $pdo->lastInsertId();

		// دسته‌بندی پیش‌فرض
		$pdo->prepare("INSERT INTO income_categories (user_id, title) VALUES (?, ?)")->execute([$user_id, 'سایر درآمدها']);
		$pdo->prepare("INSERT INTO expense_categories (user_id, title) VALUES (?, ?)")->execute([$user_id, 'سایر مخارج']);

		$success = true;

		$config_content = "<?php
        return [
            'db_host' => '$db_host',
            'db_name' => '$db_name',
            'db_user' => '$db_user',
            'db_pass' => '$db_pass'
        ];
        ";
		file_put_contents(__DIR__ . '/config.php', $config_content);

	} catch (PDOException $e) {
		$errors[] = $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نصب حساب‌جی</title>
    <style>
        body {
            font-family: 'Yekan', sans-serif;
            background: linear-gradient(135deg, #1f1f1f, #2d2d2d);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .installer {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            width: 400px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
        }
        h2 { text-align: center; margin-bottom: 20px; }
        label { display: block; margin-top: 10px; }
        input {
            width: 100%; padding: 8px;
            background: rgba(255,255,255,0.1);
            border: none; border-radius: 8px;
            color: #fff; margin-top: 5px;
        }
        button {
            margin-top: 15px; width: 100%;
            padding: 10px;
            border: none; border-radius: 8px;
            background: linear-gradient(45deg, #06beb6, #48b1bf);
            color: #fff; cursor: pointer;
            font-size: 16px;
        }
        .error { background: rgba(255,0,0,0.2); padding: 10px; margin-top: 10px; border-radius: 8px; }
        .success { background: rgba(0,255,0,0.2); padding: 10px; margin-top: 10px; border-radius: 8px; }
    </style>
</head>
<body>
<div class="installer">
    <h2>نصب حساب‌جی</h2>

	<?php if ($success): ?>
        <div class="success">✅ نصب با موفقیت انجام شد!</div>
	<?php elseif ($errors): ?>
		<?php foreach ($errors as $err): ?>
            <div class="error">❌ <?php echo htmlspecialchars($err); ?></div>
		<?php endforeach; ?>
	<?php endif; ?>

    <form method="post">
        <h3>اطلاعات دیتابیس</h3>
        <label>هاست</label>
        <input type="text" name="db_host" value="localhost" required>
        <label>نام دیتابیس</label>
        <input type="text" name="db_name" value="hesabjie" required>
        <label>یوزر دیتابیس</label>
        <input type="text" name="db_user" value="root" required>
        <label>رمز دیتابیس</label>
        <input type="password" name="db_pass">

        <h3>اطلاعات کاربر مدیر</h3>
        <label>نام کاربری</label>
        <input type="text" name="username" required>
        <label>نام و نام خانوادگی</label>
        <input type="text" name="name" required>
        <label>ایمیل</label>
        <input type="email" name="email" required>
        <label>شماره موبایل</label>
        <input type="text" name="phonenumber" required>
        <label>رمز عبور</label>
        <input type="password" name="password" required>

        <button type="submit">🚀 نصب</button>
    </form>
</div>
</body>
</html>
