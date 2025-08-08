<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تایید کد OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face {
            font-family: 'Yekan Bakh';
            font-style: normal;
            font-weight: 100 900;
            src: url('https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/webfonts/Vazirmatn-Variable.woff2') format('woff2-variations');
            font-display: swap;
        }
        * {
            box-sizing: border-box;
            font-family: 'Yekan Bakh', sans-serif;
        }
        body {
            margin: 0;
            background-color: #121212;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .otp-box {
            background: rgba(255,255,255,0.05);
            padding: 2rem;
            border-radius: 15px;
            width: 320px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            text-align: center;
        }
        h2 {
            margin-bottom: 1rem;
            font-weight: 500;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            font-size: 1.2rem;
            border-radius: 8px;
            border: 2px solid rgba(255,255,255,0.15);
            background-color: #1c1c1c;
            color: white;
            outline: none;
            transition: all 0.2s ease-in-out;
            text-align: center;
        }
        input[type="text"]:focus {
            border-color: #9b4dff;
            box-shadow: 0 0 8px #9b4dff88;
        }
        button {
            width: 100%;
            padding: 0.8rem;
            background-color: #6200ea;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
        }
        button:hover {
            background-color: #3700b3;
        }
        .timer {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #bbb;
        }
        .resend {
            color: #bb86fc;
            text-decoration: none;
            cursor: pointer;
            display: none;
        }
        .resend:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="otp-box">
    <h2>تایید کد یکبار مصرف</h2>
    <p>کد ارسال شده را وارد کنید.</p>
    <form method="post">
        <input type="text" name="otp" maxlength="6" inputmode="numeric" placeholder="مثلاً 123456">
        <button type="submit">تایید</button>
    </form>
    <div class="timer" id="timer">ارسال مجدد کد تا <span id="countdown">30</span> ثانیه</div>
    <div><span class="resend" id="resend">ارسال مجدد کد</span></div>
</div>

<script>
    const countdownEl = document.getElementById('countdown');
    const timerEl = document.getElementById('timer');
    const resendEl = document.getElementById('resend');

    let timeLeft = 30;
    let timer = setInterval(() => {
        timeLeft--;
        countdownEl.textContent = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(timer);
            timerEl.style.display = 'none';
            resendEl.style.display = 'inline';
        }
    }, 1000);

    resendEl.addEventListener('click', () => {
        alert('کد جدید ارسال شد ✅');
        resendEl.style.display = 'none';
        timeLeft = 30;
        countdownEl.textContent = timeLeft;
        timerEl.style.display = 'block';
        timer = setInterval(() => {
            timeLeft--;
            countdownEl.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(timer);
                timerEl.style.display = 'none';
                resendEl.style.display = 'inline';
            }
        }, 1000);
    });
</script>
</body>
</html>
