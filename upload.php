<!DOCTYPE html>
<html>
<head>
    <style>
        /* سبک بندی برای المنت‌های HTML */
        #container {
            width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        #progress {
            width: 300px;
            height: 20px;
            border: 1px solid black;
            background: white;
        }

        #bar {
            width: 0%;
            height: 100%;
            background: green;
        }

        #percent {
            position: relative;
            top: -22px;
            color: #1900ff;
        }

        #message {
            margin-top: 10px;
            color: red;
        }
    </style>
</head>
<body>
<div id="container">
    <h1>آپلود فایل با نمایش درصد</h1>
    <!-- فرم برای انتخاب و ارسال فایل -->
    <form id="upload-form" method="post" enctype="multipart/form-data" action="upload.php">
        <input type="file" name="file" id="file" required>
        <input type="submit" name="submit" id="submit" value="آپلود">
    </form>
    <!-- المنت‌های برای نمایش نوار و مقدار درصد پیشرفت -->
    <div id="progress">
        <div id="bar"></div>
        <div id="percent">0%</div>
    </div>
    <!-- المنت برای نمایش پیام موفقیت یا خطا -->
    <div id="message"></div>
</div>
<!-- اسکریپت برای انجام عملیات آپلود و نمایش درصد با استفاده از jQuery و Ajax -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // زمانی که فرم آپلود ارسال شود
    $("#upload-form").submit(function (event) {
        // جلوگیری از ارسال پیش‌فرض فرم
        event.preventDefault();
        // ایجاد یک شیء از کلاس FormData و افزودن فایل انتخابی به آن
        var formData = new FormData();
        var file = $("#file")[0].files[0];
        formData.append("file", file);
        // ارسال درخواست Ajax به سرور با استفاده از متد POST
        $.ajax({
            url: "./uploader.php", // آدرس فایل PHP که عملیات آپلود را انجام می‌دهد
            type: "POST",
            data: formData, // داده‌های فرم که شامل فایل است
            contentType: false, // جلوگیری از تعیین نوع محتوا توسط jQuery
            processData: false, // جلوگیری از تبدیل داده‌ها به رشته توسط jQuery
            // تابعی که در هنگام ارسال درخواست اجرا می‌شود
            beforeSend: function () {
                // تنظیم مقدار اولیه نوار و مقدار درصد پیشرفت
                $("#bar").width("0%");
                $("#percent").html("0%");
                // پاک کردن پیام قبلی
                $("#message").html("");
            },
            // تابعی که در هنگام پیشرفت درخواست اجرا می‌شود
            progress: function (event) {
                // محاسبه درصد پیشرفت بر اساس اندازه فایل و مقدار ارسال شده
                var percent = Math.round((event.loaded / event.total) * 100);
                // تنظیم عرض نوار و مقدار درصد پیشرفت
                $("#bar").width(percent + "%");
                $("#percent").html(percent + "%");
            },
            // تابعی که در صورت موفقیت آمیز بودن درخواست اجرا می‌شود
            success: function (response) {
                // نمایش پیام موفقیت با استفاده از داده‌های بازگشتی از سرور
                $("#message").html("<span style='color:green'>فایل با موفقیت آپلود شد.</span><br>نام فایل: " + response.name + "<br>اندازه فایل: " + response.size + " بایت<br>نوع فایل: " + response.type);
            },
            // تابعی که در صورت بروز خطا در درخواست اجرا می‌شود
            error: function (request, status, error) {
                // نمایش پیام خطا با استفاده از متن خطا
                $("#message").html("<span style='color:red'>خطا در آپلود فایل: " + error + "</span>");
            }
        });
    });
</script>
</body>
</html>
