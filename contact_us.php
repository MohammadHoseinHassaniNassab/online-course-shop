<?php
session_start();
include "./components/connection.php";
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
</head>
<body>
<?php
include "components/header.php";
?>



<div class="container">
    <div class="bg-white rounded-5 p-5 m-5">
        <h1>تماس با ما</h1>
        <p>ما خوشحالیم که شما را در سایت خود می‌بینیم. اگر سوال، پیشنهاد، انتقاد یا هر نظری در مورد سایت یا محصولات ما دارید، می‌توانید با ما از طریق راه‌های زیر تماس بگیرید. ما همیشه آماده شنیدن نظرات شما هستیم و سعی می‌کنیم در اسرع وقت به شما پاسخ دهیم.</p>
        <ul>
            <li>تلفن: 32793001-051</li>
            <li>ایمیل: info@lebaseton.ir</li>
            <li>آدرس: خراسان رضوی مشهد بلوار شهید مفتح مفتح 20 پلاک 203</li>
            <li>تلگرام: lebaseton_online_education@</li>
        </ul>
        <p>همچنین می‌توانید از طریق فرم زیر با ما در ارتباط باشید. لطفا فیلدهای مربوطه را با دقت پر کنید و پیام خود را برای ما ارسال کنید. ما در اولین فرصت به شما بازخورد خواهیم داد.</p>
        <form action="#" method="post" class="w-50">
            <div class="form-group">
                <label for="name">نام و نام خانوادگی</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="subject">موضوع</label>
                <input type="text" name="subject" id="subject" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">پیام</label>
                <textarea name="message" id="message" class="form-control" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">ارسال پیام</button>
            </div>
        </form>
    </div>
</div>




<?php
include "components/footer.php";
?>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/public.js"></script>
</body>
</html>