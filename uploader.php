// فایل upload.php که عملیات آپلود را انجام می‌دهد
<?php
// تعیین پوشه‌ای که فایل‌ها در آن ذخیره می‌شوند
$target_dir = "./img";
// تعیین نام و مسیر کامل فایل آپلود شده
$target_file = $target_dir . basename($_FILES["file"]["name"]);
// تعیین متغیری برای بررسی شرایط آپلود
$uploadOk = 1;
// بررسی اینکه فایل واقعاً ارسال شده است یا خیر
if(isset($_POST["submit"])) {
    // بررسی اینکه فایل دارای اندازه‌ای معتبر است یا خیر
    if ($_FILES["file"]["size"] > 0) {
        // بررسی اینکه فایل دارای فرمت مجاز است یا خیر
        $allowed_types = array("jpg", "png", "gif", "pdf", "doc", "docx");
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($file_type, $allowed_types)) {
            // بررسی اینکه فایل قبلاً آپلود نشده است یا خیر
            if (!file_exists($target_file)) {
                // تلاش برای آپلود فایل به پوشه مورد نظر
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    // اگر آپلود موفقیت‌آمیز بود، اطلاعات فایل را به صورت JSON برگردان
                    $response = array(
                        "status" => "success",
                        "name" => basename($_FILES["file"]["name"]),
                        "size" => $_FILES["file"]["size"],
                        "type" => $_FILES["file"]["type"]
                    );
                    echo json_encode($response);
                } else {
                    // اگر آپلود ناموفق بود، پیغام خطا را به صورت JSON برگردان
                    $response = array(
                        "status" => "error",
                        "message" => "خطا در آپلود فایل"
                    );
                    echo json_encode($response);
                }
            } else {
                // اگر فایل قبلاً آپلود شده بود، پیغام خطا را به صورت JSON برگردان
                $response = array(
                    "status" => "error",
                    "message" => "فایلی با این نام قبلاً آپلود شده است"
                );
                echo json_encode($response);
            }
        } else {
            // اگر فایل دارای فرمت غیرمجاز بود، پیغام خطا را به صورت JSON برگردان
            $response = array(
                "status" => "error",
                "message" => "فرمت فایل مجاز نیست"
            );
            echo json_encode($response);
        }
    } else {
        // اگر فایل دارای اندازه‌ی صفر بود، پیغام خطا را به صورت JSON برگردان
        $response = array(
            "status" => "error",
            "message" => "فایلی انتخاب نشده است"
        );
        echo json_encode($response);
    }
}
?>
