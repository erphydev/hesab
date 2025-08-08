<?php
// مسیر فیزیکی پروژه
define('BASE_PATH', dirname(__DIR__, 1) . '/');

// مسیرهای مهم
define('APP_PATH', BASE_PATH . 'app/');
define('CORE_PATH', APP_PATH . 'core/');
define('CONFIG_PATH', BASE_PATH . 'config/');
define('PUBLIC_PATH', BASE_PATH . 'public/');

// جلوگیری از تعریف مجدد BASE_URL
if (!defined('BASE_URL')) {
	// پروتکل
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
		|| $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

	// هاست
	$host = $_SERVER['HTTP_HOST'];

	// مسیر بعد از دامنه
	$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
	$publicPos = strpos($scriptName, '/public/');

	if ($publicPos !== false) {
		$baseDir = substr($scriptName, 0, $publicPos + 8); // شامل /public/
	} else {
		$baseDir = rtrim(str_replace('/index.php', '', $scriptName), '/') . '/';
	}

	// تعریف BASE_URL نهایی
	define('BASE_URL', $protocol . $host . $baseDir);
}
