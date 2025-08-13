# حساب (Hesab) - سیستم حسابداری شخصی تحت وب

**Hesab** یک سیستم حسابداری شخصی تحت وب است که با **PHP** و معماری **MVC** توسعه داده شده و از پایگاه‌داده **MySQL** استفاده می‌کند. این سیستم برای مدیریت امور مالی شخصی، ثبت درآمدها و هزینه‌ها و دریافت گزارش‌های ساده و دقیق طراحی شده است. محیط کاربری آن کاملاً فارسی بوده و پشتیبانی کامل از تاریخ شمسی دارد

---

## ✨ ویژگی‌ها
- ثبت و مدیریت درآمدها و هزینه‌ها
- دسته‌بندی تراکنش‌ها (قابل تعریف توسط کاربر)
- گزارش‌گیری بر اساس بازه زمانی یا دسته‌بندی
- ذخیره تاریخ‌ها به صورت **میلادی** و نمایش به صورت **شمسی**
- رابط کاربری ساده و مناسب استفاده روزمره
- امنیت داده‌ها با استفاده از PDO و Prepared Statements
- معماری MVC برای سهولت توسعه و نگهداری

---

## 🛠 پیش‌نیازها
- PHP نسخه 7.4 یا بالاتر
- MySQL یا MariaDB
- Composer (برای نصب کتابخانه‌ها)
- وب‌سرور Apache/Nginx یا PHP Built-in Server

---

## 📥 نصب و راه‌اندازی

**1. کلون کردن پروژه**
```bash
git clone https://github.com/erphydev/hesab.git
cd hesab
```

**2. نصب وابستگی‌ها**
```bash
composer install
```

**3. ایجاد دیتابیس**
```sql
CREATE DATABASE hesab CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- سپس جداول را طبق اسکریپت موجود در پوشه database ایجاد کنید
```

**4. پیکربندی اتصال دیتابیس**
فایل `core/db.php` را ویرایش کنید:
```php
$host = 'localhost';
$dbname = 'hesab';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

---

## 📅 تاریخ شمسی

به منظور جلوگیری از مشکلات مرتب‌سازی و فیلترینگ، تاریخ‌ها به فرمت میلادی (`DATETIME`) در دیتابیس ذخیره می‌شوند. برای نمایش به کاربر، از کتابخانه [`morilog/jalali`](https://github.com/morilog/jalali) استفاده کنید:

**نصب پکیج:**
```bash
composer require morilog/jalali
```

**نمونه استفاده:**
```php
use Morilog\Jalali\Jalalian;

$shamsiDate = Jalalian::fromDateTime($transaction['created_at'])->format('Y/m/d');
```

---

## 🚀 اجرای سریع

با استفاده از PHP داخلی:
```bash
php -S localhost:8000 -t public
```
سپس مرورگر را باز کنید و آدرس زیر را وارد کنید:
[http://localhost:8000](http://localhost:8000)

---

## 📄 مجوز
این پروژه تحت مجوز **MIT** منتشر شده و شما آزادید آن را استفاده، ویرایش و بازنشر کنید. برای جزئیات بیشتر فایل `LICENSE` را ببینید.
