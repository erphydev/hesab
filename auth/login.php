<?php
require_once __DIR__ . '/../app/core/constants.php';
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ورود</title>
    <style>
        /* Import Yekan Bakh Font */
        @font-face {
            font-family: 'Yekan Bakh';
            font-style: normal;
            font-weight: 100 900;
            src: url('https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/webfonts/Vazirmatn-Variable.woff2') format('woff2-variations');
            font-display: swap;
        }

        body, input, button {
            font-family: 'Yekan Bakh', sans-serif;
        }

        body {
            font-family: 'Yekan Bakh', sans-serif;
            background-color: #121212;
            color: #fff;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-box {
            background: rgba(255,255,255,0.05);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        input {
            width: 100%;
            padding: 0.6rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 0.7rem;
            border: none;
            border-radius: 8px;
            background-color: #6200ea;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #3700b3;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>ورود</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="نام کاربری">
        <input type="password" name="password" placeholder="رمز عبور">
        <button type="submit">ورود</button>
    </form>
</div>
</body>
</html>
