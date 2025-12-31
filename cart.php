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
include "./components/header.php";
?>



<section class="container-lg my-5 py-3">
    <div class="row row-cols-1 p-3">
        <?php
        if (isset($_SESSION["is_user_logedin"]) && $_SESSION["is_user_logedin"]) {
            if (!empty($user_cart)) {
                foreach ($user_cart as $item)
                {
                    $prodouct_id = $item;
                    $prodouct = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `prodoucts` WHERE id = '$prodouct_id'"), MYSQLI_ASSOC)[0];
                    $id = $prodouct["id"];
                    $name = $prodouct["name"];
                    $img = $prodouct["img_url"];
                    $price = $prodouct["price"];
                    $all_price += $price;
                    ?>

                    <form class='col h-100 my-3' method='post' action='add_to_cart.php'>
                        <input type="number" name='id' value='<?=$id?>' class='d-none'>
                        <div class='text-center border border-5 rounded-1 p-2 border-light w-100 d-flex bg-white align-items-center'>
                            <img src='<?=$img?>' class='' style="width: 300px" alt="عکس محصول">
                            <h4 class="w-50"><?=$prodouct["name"]?></h4>
                            <div class='w-100 d-flex justify-content-end align-items-center'>
                                <button class="btn btn-danger" type="submit" name="btn_remove_to_cart">حذف از سبد خرید</button>
                                <div class="d-flex align-items-center ">
                                    <div class='d-flex justify-content-end me-1'>
                                        <sub class='text-danger fw-bold'> تومان </sub>
                                        <h6 class='price ms-1'><?=$price?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php } ?>

                <div class="d-flex justify-content-center text-center mt-5">
                    <div class="flex-column bg-white rounded-5">
                        <div class="p-5">
                            <h2 class="fw-bolder">فاکتور شما :</h2>
                            <br />
                            <?php
                            foreach ($user_cart as $item) {
                                $prodouct_id = $item;
                                $prodouct = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `prodoucts` WHERE id = '$prodouct_id'"), MYSQLI_ASSOC)[0];
                                $title = $prodouct["name"];
                                $price = $prodouct["price"];?>

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
                            <h4 class="fw-bolder">مبلغ قابل پرداخت : </h4>
                            <div class='d-flex justify-content-end me-1'>
                                <sub class='text-danger fw-bold'> تومان </sub>
                                <h5 class='price ms-1 fw-bold'><?=$all_price?></h5>
                            </div>
                        </div>
                        <form class="col-12 col-xl-5 d-flex justify-content-end w-100 px-5" method="post" action="./pay.php">
                            <button type="submit" name="submit_cart" class="w-100 my-success-btn p-3 rounded-4 fs-3 fw-bolder mb-5">ثبت و پرداخت</button>
                        </form>
                    </div>
                </div>

            <?php } else { ?>
                <div class="alert alert-danger w-100 text-center fs-2 fw-bolder">در حال حاضر سبد خرید شما خالی می باشد</div>
            <?php }
        } else { ?>
        <div class="alert alert-danger w-100 text-center fs-2 fw-bolder">لطفا ابتدا وارد حساب کاربری خود شوید</div>
        <?php } ?>
    </div>
</section>



<?php
include "components/footer.php";
?>
<script src="js/public.js"></script>
<script src="js/cart.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>