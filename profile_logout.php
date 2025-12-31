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

if (isset($_POST["btn_logout"])) {
    setcookie("is_user_logedin", true, time() - (86400 * 30));
    setcookie("user_user_name", "", time() - (86400 * 30));
    setcookie("user_password", "", time() - (86400 * 30));
    setcookie("user_id", "", time() - (86400 * 30));
    session_destroy();
    header("location: ./index.php");
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
                <li class="nav-item"><a href="./profile_chang_password.php" class="nav-link">تغییر رمز عبور</a></li>
                <br />
                <li class="nav-item"><a href="./profile_my_crouses.php" class="nav-link">دوره های من</a></li>
                <br />
                <li class="nav-item"><a href="./profile_orders.php" class="nav-link">صورتحساب ها</a></li>
                <br />
                <li class="nav-item bg-white rounded-5 border border-danger"><a href="./profile_logout.php" class="nav-link text-danger">خروج از حساب</a></li>
            </ul>
        </div>

        <div class="col-12 col-xl-8">
            <form action="#" method="post">
                <button class="btn btn-outline-danger w-100 btn-lg rounded-5" type="submit" name="btn_logout">خروج از حساب کاربری</button>
            </form>
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