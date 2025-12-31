<?php
session_start();
include "./components/connection.php";
if (isset($_SESSION["is_user_logedin"]) || isset($_COOKIE["is_user_logedin"])) {
    $_SESSION["is_user_logedin"] = true;
    $_SESSION["user_user_name"] = $_COOKIE["user_user_name"];
    $_SESSION["user_password"] = $_COOKIE["user_password"];
    $_SESSION["user_id"] = $_COOKIE["user_id"];
    $user_id = $_SESSION["user_id"];
    $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE id = $user_id"),MYSQLI_ASSOC);
}
$error = "d-none";
$text = "";
if (isset($_POST["edit_password"])) {
    if ($_POST["current_password"] == $result[0]["password"]) {
        if ($_POST["new_password"] == $_POST["confirm_new_password"]) {
            $password = $_POST["new_password"];
            mysqli_query($connection, "UPDATE `users` SET `password`='$password'  WHERE `id`='$user_id'");
        } else {
            $error = "d-block";
            $text = "رمز جدید با تکرار رمز جدید تفاوت دارد .";
        }
    } else {
        $error = "d-block";
        $text = "رمز عبور فعلی اشتباه است .";
    }
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



<div class="container my-5">
    <div class="row">
        <div class="col-12 col-xl-4">
            <ul class="nav d-flex flex-column text-center">
                <li class="nav-item"><a href="./profile_main.php" class="nav-link">اطلاعات حساب</a></li>
                <br />
                <li class="nav-item bg-white rounded-5"><a href="./profile_chang_password.php" class="nav-link">تغییر رمز عبور</a></li>
                <br />
                <li class="nav-item"><a href="./profile_my_crouses.php" class="nav-link">دوره های من</a></li>
                <br />
                <li class="nav-item"><a href="./profile_orders.php" class="nav-link">صورتحساب ها</a></li>
                <br />
                <li class="nav-item"><a href="./profile_logout.php" class="nav-link">خروج از حساب</a></li>
            </ul>
        </div>

        <div class="col-12 col-xl-8">
            <div>
                <form method="post" action="#">
                    <h5 class="fw-bold mt-2">رمز عبور فعلی :</h5>
                    <input type="text" name="current_password" placeholder="رمز عبور فعلی :" class="form-control form-control-lg">
                    <h5 class="fw-bold mt-2">رمز عبور جدید :</h5>
                    <input type="text" name="new_password" placeholder="رمز عبور جدید :" class="form-control form-control-lg">
                    <h5 class="fw-bold mt-2">تکرار رمز عبور جدید :</h5>
                    <input type="text" name="confirm_new_password" placeholder="تکرار رمز عبور جدید :" class="form-control form-control-lg">
                    <button class="btn btn-primary w-100 btn-lg mt-3" name="edit_password">ثبت اطلاعات</button>
                    <div class="alert alert-danger text-center text-danger mt-3 <?=$error?>"><?=$text?></div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
include "components/footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
<script src="./js/profile_main.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="./js/prodouct.js"></script>
<script src="js/public.js"></script>
</body>
</html>