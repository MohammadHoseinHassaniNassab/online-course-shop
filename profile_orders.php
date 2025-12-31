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
    $orders = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `orders` WHERE `buyer_user_id` = $user_id"),MYSQLI_ASSOC);
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
                <li class="nav-item bg-white rounded-5"><a href="./profile_orders.php" class="nav-link">صورتحساب ها</a></li>
                <br />
                <li class="nav-item"><a href="./profile_logout.php" class="nav-link text-danger">خروج از حساب</a></li>
            </ul>
        </div>

        <div class="col-12 col-xl-8">
            <div class="row row-cols-1 row-cols-xl-2">
                <?php
                foreach ($orders as $order) { $all_price = 0; ?>
                    <div class="col p-3">
                        <div class="flex-column bg-white rounded-5">
                            <div class="p-5">
                                <div class="w-100 d-flex justify-content-between">
                                    <h3 class="fw-bolder">شماره فاکتور :</h3>
                                    <h4 class="fw-bold">#1000<?=$order["id"];?></h4>
                                </div>

                                <div class="w-100 d-flex justify-content-between">
                                    <h3 class="fw-bolder">تاریخ فاکتور :</h3>
                                    <h4 class="fw-bold"><?=$order["tarikh"];?></h4>
                                </div>                                <?php
                                $ids = json_decode($order["items"]);
                                foreach ($ids as $item) {
                                    $prodouct_id = $item;
                                    $prodouct = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `prodoucts` WHERE id = '$prodouct_id'"), MYSQLI_ASSOC)[0];
                                    $title = $prodouct["name"];
                                    $price = $prodouct["price"];
                                    $all_price += $price;
                                    ?>
                                    <div class="d-flex border-top border-2 py-3 justify-content-between">
                                        <h4><?=$title?></h4>
                                        <div class='d-flex justify-content-end me-1'>
                                            <sub class='text-danger fw-bold'> تومان </sub>
                                            <h6 class='price ms-1'><?=$price?></h6>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="w-100 d-flex align-items-center mb-5" style="height: 70px;">
                                <div class="rounded-circle position-relative" style="width: 40px; height: 40px; background: #F3F4F6FF; right: -20px"></div>
                                <div class="w-100" style="border-top: dashed 5px #adadad"></div>
                                <div class="rounded-circle position-relative" style="width: 40px; height: 40px; background: #F3F4F6FF; left: -20px"></div>
                            </div>
                            <div class="d-flex justify-content-between px-5 mb-5">
                                <h4 class="fw-bolder">مبلغ فاکتور : </h4>
                                <div class='d-flex justify-content-end me-1'>
                                    <sub class='text-danger fw-bold'> تومان </sub>
                                    <h5 class='price ms-1 fw-bold'><?=$all_price?></h5>
                                </div>
                            </div>
                            <form class="col-12 col-xl-5 d-flex justify-content-end w-100 px-5" method="post" action="./pay.php">
                                <button type="submit" name="submit_cart" class="w-100 my-success-btn p-3 rounded-4 fs-3 fw-bolder mb-5" disabled>
                                    پرداخت شده
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php }
                ?>
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