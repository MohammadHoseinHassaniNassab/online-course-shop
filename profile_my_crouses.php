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
$crouses_id = json_decode($result[0]["rigestered_crouses"]);
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
                <li class="nav-item bg-white rounded-5"><a href="./profile_my_crouses.php" class="nav-link">دوره های من</a></li>
                <br />
                <li class="nav-item"><a href="./profile_orders.php" class="nav-link">صورتحساب ها</a></li>
                <br />
                <li class="nav-item"><a href="./profile_logout.php" class="nav-link">خروج از حساب</a></li>
            </ul>
        </div>

        <div class="col-12 col-xl-8">
            <div class="row row-cols-1 row-cols-lg-3">
                <?php
                foreach ($crouses_id as $crouse_id)
                {
                    $prodouct = mysqli_fetch_all(mysqli_query($connection,"SELECT * FROM `prodoucts` WHERE `id`='$crouse_id'"), MYSQLI_ASSOC);

                    $id = $prodouct[0]["id"];
                    $name = $prodouct[0]["name"];
                    $img = $prodouct[0]["img_url"];
                    $price = $prodouct[0]["price"];
                    ?>

                    <form class='col h-100 my-3' method='get' action='prodouct.php'>
                        <input name='id' value='<?=$id?>' class='d-none'>
                        <button type='submit' class='card text-center rounded-4 hover-shadow border h-100 p-0'>
                            <img src='<?=$img?>' class='card-img-top rounded-4'>
                            <div class='w-100 px-2'>
                                <h4 class='card-text text-start ms-1 mt-3 fw-bolder'>
                                    <?=$name?>
                                </h4>
                                <h6 class="text-muted text-start">
                                    <?=$prodouct[0]["low_description"]?>...
                                </h6>
                                <div class='d-flex justify-content-between me-1 card-footer bg-white'>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill text-muted" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                        </svg>
                                        <?=$prodouct[0]["coustomers"]?>
                                    </div>
                                    <div class="d-flex justify-content-end me-1">
                                        <sub class='text-danger fw-bold'> تومان </sub>
                                        <h6 class='price ms-1'><?=$price?></h6>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </form>


                    <?php
                }
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