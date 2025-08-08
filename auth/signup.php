<?php
require_once __DIR__ . '/../app/core/constants.php';
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ثبت نام</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face {
            font-family: 'Yekan Bakh';
            font-style: normal;
            font-weight: 100 900;
            src: url('https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/webfonts/Vazirmatn-Variable.woff2')
            format('woff2-variations');
            font-display: swap;
        }

        * {
            box-sizing: border-box;
            font-family: 'Yekan Bakh', sans-serif;
        }
        body {
            margin: 0;
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
            background: rgba(255,255,255,0.05);
            padding: 2rem;
            border-radius: 15px;
            width: 320px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        input {
            width: 100%;
            padding: 0.7rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 8px;
        }
        input:focus {
            outline: 2px solid #6200ea;
        }
        button {
            width: 100%;
            padding: 0.8rem;
            background-color: #6200ea;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            margin-top: 0.7rem;
            font-size: 1rem;
        }
        button:hover {
            background-color: #3700b3;
        }
        .link {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #aaa;
        }
        .link a {
            color: #bb86fc;
            text-decoration: none;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="register-box">
    <h2>ثبت نام</h2>
    <form action="" method="post">
        <input type="text" name="name" placeholder="نام و نام خانوادگی" required>
        <input type="text" name="username" placeholder="نام کاربری" required>
        <input type="email" name="email" placeholder="ایمیل" required>
        <input type="tel" name="phonenumber" placeholder="شماره موبایل" required>
        <input type="password" name="password" placeholder="رمز عبور" required>
        <button type="submit">ثبت نام</button>
    </form>
    <div class="link">
        قبلاً ثبت‌نام کرده‌اید؟ <a href="login.php">ورود</a>
    </div>
</div>
</body>
</html>
