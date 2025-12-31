<?php
session_start();
$login_failed_show = "";
$signin_success_show = "";
$user_name_in_use_show = "";
include "./components/connection.php";

if (isset($_SESSION["is_user_logedin"]) || isset($_COOKIE["is_user_logedin"])) {
    $_SESSION["is_user_logedin"] = true;
    $_SESSION["user_user_name"] = $_COOKIE["user_user_name"];
    $_SESSION["user_password"] = $_COOKIE["user_password"];
    $_SESSION["user_id"] = $_COOKIE["user_id"];
    header("location: ./index.php");
} else if (isset($_POST["btn_submit_login"])) {
    $user_name = $_POST["user_name_login"];
    $password = $_POST["password_login"];
    $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE `user_name` = '$user_name' AND `password` = '$password'"), MYSQLI_ASSOC);
    if (count($result) === 1) {
        $_SESSION["is_user_logedin"] = true;
        $_SESSION["user_user_name"] = $user_name;
        $_SESSION["user_password"] = $password;
        $_SESSION["user_id"] = $result[0]["id"];
        setcookie("is_user_logedin", true, time() + (86400 * 30));
        setcookie("user_user_name", $user_name, time() + (86400 * 30));
        setcookie("user_password", $password, time() + (86400 * 30));
        setcookie("user_id", $result[0]["id"], time() + (86400 * 30));
        header("location: ./index.php");
    } else {
        $login_failed_show = "checked";
    }
} else if (isset($_POST["btn_submit_signin"])) {
    $name = $_POST["name_signin"];
    $user_name = $_POST["user_name_signin"];
    $password = $_POST["password_signin"];
    $phone_number = $_POST["phone_number_signin"];
    $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE user_name = '$user_name'"), MYSQLI_ASSOC);
    if (count($result) >= 1) {
        $user_name_in_use_show = "checked";
    } else {
        $signin_success_show = "checked";
        mysqli_query($connection, "INSERT INTO `users`(`name`, `user_name`, `password`, `phone_number`) VALUES ('$name','$user_name','$password','$phone_number')");
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title></title>
</head>
<body>
<?php
include "components/header.php";
?>

<input type="checkbox" id="signin-success-show" hidden <?=$signin_success_show?>>
<span class="alert alert-success position-fixed fs-5 shadow-sm d-flex align-items-center" id="signin-success" style="top: 10px; left: 10px; z-index: 25"><label for="signin-success-show" class="btn-close me-2"></label> ثبت نام شما با موفقیت انجام شد لطفا از قسمت ورود وارد اکانت خود شوید</span>
<input type="checkbox" id="fill-filds-show" hidden>
<span class="alert alert-danger position-fixed fs-5 shadow-sm d-flex align-items-center" id="fill-filds" style="top: 10px; left: 10px; z-index: 25"><label for="fill-filds-show" class="btn-close me-2"></label> لطفا تمامی فیلد ها را به درستی پر کنید</span>
<input type="checkbox" id="password-not-mach-show" hidden>
<span class="alert alert-danger position-fixed fs-5 shadow-sm d-flex align-items-center" id="password-not-mach" style="top: 10px; left: 10px; z-index: 25"><label for="password-not-mach-show" class="btn-close me-2"></label> رمز عبور با تکرار رمز عبور یکسان نیست</span>
<input type="checkbox" id="login-failed-show" hidden <?=$login_failed_show?>>
<span class="alert alert-danger position-fixed fs-5 shadow-sm d-flex align-items-center" id="login-failed" style="top: 10px; left: 10px; z-index: 25"><label for="login-failed-show" class="btn-close me-2"></label> ورود موفقیت آمیز نبود نام کاربری یا رمز عبور اشتباه است</span>
<input type="checkbox" id="user-name-in-use-show" hidden <?=$user_name_in_use_show?>>
<span class="alert alert-danger position-fixed fs-5 shadow-sm d-flex align-items-center" id="user-name-in-use" style="top: 10px; left: 10px; z-index: 25"><label for="user-name-in-use-show" class="btn-close me-2"></label> لطفا نام کاربری دیگری انتخاب کنید زیرا نام کاربری مورد نظر توسط کاربر دیگری انتخاب شده</span>
<div class="d-flex justify-content-center mt-5">
    <div class="d-flex justify-content-center flex-column">
        <div class="btn-group btn-group-lg bg-primary pb-5 rounded-bottom-0 rounded-top-5">
            <button class="btn btn-primary rounded-top-5 rounded-bottom-0 disabled" id="btn-login" style="border-top-left-radius: 0!important;" onclick="login_form_func()">ورود</button>
            <button class="btn btn-primary rounded-top-5 rounded-bottom-0" style="border-top-right-radius: 0!important;" id="btn-signin" onclick="signin_form_func()">ثبت نام</button>
        </div>
        <form class="border p-5 rounded-5 shadow-lg position-relative bg-white" id="login-form" style="top: -11%" method="post" action="#"><h2 class="text-center">فرم ورود</h2>
            <input type="text" name="user_name_login" id="user_name_login" class="form-control form-control-lg mt-3 w-100" placeholder="نام کاربری را وارد کنید">
            <div class="input-group input-group-lg mt-3">
                <input type="password" name="password_login" class="form-control form-control-lg" placeholder="رمز عبور را وارد کنید" id="password_login">
                <span class="input-group-text" id="show_password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"></path>
                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"></path>
                    </svg>
                </span>
            </div>
            <input type="submit" class="btn btn-lg btn-primary mt-3 w-100" value="ورود" name="btn_submit_login" id="btn_submit_login">
        </form>
        <form class="border p-5 rounded-5 shadow-lg position-relative bg-white d-none" id="signin-form" style="top: -7%" method="post" action="#"><h2 class="text-center">فرم ثبت نام</h2>
            <input type="text" name="name_signin" id="name_signin" class="form-control form-control-lg mt-3 w-100" placeholder="نام خود را وارد کنید">
            <input type="text" name="user_name_signin" id="user_name_signin" class="form-control form-control-lg mt-3 w-100" placeholder="نام کاربری خود را وارد کنید">
            <div class="input-group input-group-lg mt-3">
                <input type="password" name="password_signin" class="form-control form-control-lg" placeholder="رمز عبور خود را وارد کنید" id="password_signin">
                <span class="input-group-text" id="show_password1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"></path>
                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"></path>
                    </svg>
                </span>
            </div>
            <small class="text-danger">توجه : رمز عبور شما باید از 8 کرکتر بیشتر باشد</small>
            <div class="input-group input-group-lg mt-3">
                <input type="password" name="re_password_signin" class="form-control form-control-lg" placeholder="رمز عبور خود را تکرار کنید" id="re_password_signin">
                <span class="input-group-text" id="show_re_password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"></path>
                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"></path>
                    </svg>
                </span>
            </div>
            <input type="number" name="phone_number_signin" id="phone_number_signin" class="form-control form-control-lg mt-3 w-100" style="direction: rtl; " placeholder="شماره تلفن خود را وارد کنید">
            <small class="text-danger">توجه : شماره موبایل خود را با دقت وارد کنید</small>
            <input type="submit" class="btn btn-lg btn-primary mt-3 w-100" value="ورود" name="btn_submit_signin" id="btn_submit_signin">
        </form>
    </div>
</div>



<script src="js/public.js"></script>
<script src="js/login.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>