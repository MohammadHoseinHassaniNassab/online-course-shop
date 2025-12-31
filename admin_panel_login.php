<?php
session_start();
include "./components/connection.php";
if (isset($_SESSION["is_admin_logedin"]) || isset($_COOKIE["is_admin_logedin"])) {
    header("location: ./admin_panel_prodoucts.php");
} else if (isset($_POST["btn_submit"])) {
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `admins` WHERE user_name = '$user_name' AND password = '$password'"), MYSQLI_ASSOC);
    if (count($result) >= 1) {
        $_SESSION["is_admin_logedin"] = true;
        $_SESSION["admin_user_name"] = $user_name;
        $_SESSION["admin_password"] = $password;
        setcookie("is_admin_logedin", true, time() + (86400 * 30), "/");
        setcookie("admin_user_name", $user_name, time() + (86400 * 30), "/");
        setcookie("admin_password", $password, time() + (86400 * 30), "/");
        header("location: ./admin_panel_prodoucts.php");
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
<body class="d-flex align-items-center justify-content-center w-100 bg-dark" style="height: 100vh">



<form class="border p-5 rounded-5 shadow-lg" method="post" action="#">
    <h2 class="text-white text-center">فرم ورود</h2>
    <input type="text" name="user_name" class="form-control form-control-lg mt-3 w-100" placeholder="نام کاربری را وارد کنید">
    <div class="input-group input-group-lg mt-3">
        <input type="password" name="password" class="form-control form-control-lg" placeholder="رمز عبور را وارد کنید" id="password">
        <span class="input-group-text" id="show_password">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
            </svg>
        </span>
    </div>
    <input type="submit" class="btn btn-lg btn-primary mt-3 w-100" value="ورود" name="btn_submit">
</form>



<script src="js/public.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>