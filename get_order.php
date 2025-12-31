<?php
session_start();
include "./components/connection.php";
$all_price = 0;
if (isset($_SESSION["is_user_logedin"]) || isset($_COOKIE["is_user_logedin"])) {
    $_SESSION["is_user_logedin"] = true;
    $_SESSION["user_user_name"] = $_COOKIE["user_user_name"];
    $_SESSION["user_password"] = $_COOKIE["user_password"];
    $_SESSION["user_id"] = $_COOKIE["user_id"];
    $user_id = $_SESSION["user_id"];
    $DB_user_cart = mysqli_fetch_all(mysqli_query($connection, "SELECT `cart` FROM `users` WHERE id = $user_id"), MYSQLI_ASSOC);
    $user_cart = json_decode($DB_user_cart[0]["cart"]);
}
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



<section class="container-xl">
    <form method="get" class="w-100 d-flex justify-content-center align-items-center flex-wrap">
        <div class="w-50 p-2">
            <label>نام و نام خانوادگی : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
            <input class="form-control" type="text" name="name_family">
        </div>
        <div class="w-50 p-2">
            <label>شماره تلفن : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
            <input class="form-control" type="text" name="phone">
        </div>
        <div class="ir-select w-100 d-flex">
            <div class="w-50 p-2">
                <label>استان : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
                <select class="ir-province form-select" name="province">
                </select>
            </div>
            <div class="w-50 p-2">
                <label>شهر : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
                <select class="ir-city form-select" name="city"></select>
            </div>
        </div>
        </div>
        <div class="w-50 p-2">
            <label>خیابان : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
            <input class="form-control" type="text" name="street">
        </div>
        <div class="w-50 p-2">
            <label>پلاک : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
            <input class="form-control" type="text" name="plak">
        </div>
        <div class="w-50 p-2">
            <label>طبقه : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
            <input class="form-control" type="text" name="floor">
        </div>
        <div class="w-50 p-2">
            <label>کد پستی : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
            <input class="form-control" type="text" name="zip_code">
        </div>
        <div class="w-100 p-2">
            <label>توضیحات : <span title="پر کردن این فیلد ضروری است" class="text-danger fs-5">*</span></label>
            <textarea class="form-control" type="text" name="description"></textarea>
        </div>
        <input type="submit" class="btn btn-success w-100 btn-lg" name="pay" value="ثبت اطلاعات و پرداخت">
    </form>
</section>



<?php
include "components/footer.php";
?>
<script src="js/public.js"></script>
<script src="js/cart.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://github.com/KayvanMazaheri/ir-city-select/releases/download/v0.2.0/ir-city-select.min.js"></script>

</body>
</html>