<?php
// اطلاعات پایگاه داده
$servername = "localhost"; // یا "127.0.0.1"
$username = "root"; // نام کاربری MySQL خود
$password = ""; // رمز عبور MySQL خود
$dbname = "comment_app"; // نام پایگاه داده شما

// ایجاد اتصال به پایگاه داده
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به پایگاه داده با شکست مواجه شد: " . $conn->connect_error);
}

// داده‌های ورودی از فرم
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

// هش کردن رمز عبور
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// درج اطلاعات به جدول `users`
$sql = "INSERT INTO users (username, password, email) VALUES ('$user', '$hashed_password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "ثبت‌نام موفقیت‌آمیز بود!";
} else {
    echo "خطا در ثبت‌نام: " . $conn->error;
}

// بستن اتصال به پایگاه داده
$conn->close();
?>
