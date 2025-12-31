<?php
session_start();
include "./components/connection.php";
$prodoucts = array_reverse(mysqli_fetch_all(mysqli_query($connection,"SELECT * FROM `prodoucts` WHERE 1"), MYSQLI_ASSOC));
$categories = mysqli_fetch_all(mysqli_query($connection,"SELECT * FROM `categories` WHERE 1"), MYSQLI_ASSOC);
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
<body onscroll="scroll()" >
<?php
include "components/header.php";
?>

<div class="d-flex w-100 align-items-center justify-content-center home-page-bg">
    <div class="d-flex flex-column align-items-center box rounded-5 mx-5 p-5" style="border: solid 5px #cbcbcb;">
        <h1 class="fw-bolder">ما به هر قیمتی</h1>
        <h1 class="fw-bolder"> دوره تولید نمی کنیم!</h1>
        <br />
        <h3 class="fw-bold">با آکادمی لباستون، طراحی و دوخت انواع لباس رو با خیال راحت یاد بگیر و پیشرفت کن</h3>
    </div>
</div>

<div class="w-100 position-relative" style="height: 70px; background-image: linear-gradient(transparent, #F3F4F6FF); top: -70px"></div>


<section class="container-lg my-5 py-3">
    <div class="d-flex justify-content-between align-items-center">
        <span class="border-danger border-5 border-bottom fs-2 ">
            جدیدترین دوره های ما :
        </span>
        <a href="prodoucts.php" class="page-link link-danger">مشاهده تمامی دوره ها ></a>
    </div>
    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" slides-per-view="4">
        <?php
        $iden = 1;
        foreach ($prodoucts as $prodouct)
        {
            $id = $prodouct["id"];
            $name = $prodouct["name"];
            $img = $prodouct["img_url"];
            $price = $prodouct["price"];
            ?>
        <swiper-slide>
            <form class='col h-100 my-3' method='get' action='prodouct.php'>
                <input name='id' value='<?=$id?>' class='d-none'>
                <button type='submit' class='card text-center rounded-4 hover-shadow border h-100 p-0'>
                    <img src='<?=$img?>' class='card-img-top rounded-4'>
                    <div class='w-100 px-2'>
                        <h4 class='card-text text-start ms-1 mt-3 fw-bolder'>
                            <?=$name?>
                        </h4>
                        <h6 class="text-muted text-start">
                            <?=$prodouct["low_description"]?>...
                        </h6>
                        <div class='d-flex justify-content-between me-1 card-footer bg-white'>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill text-muted" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                                <?=$prodouct["coustomers"]?>
                            </div>
                            <div class="d-flex justify-content-end me-1">
                                <sub class='text-danger fw-bold'> تومان </sub>
                                <h6 class='price ms-1'><?=$price?></h6>
                            </div>
                        </div>
                    </div>
                </button>
            </form>
        </swiper-slide>
            <?php
            $iden++;
            if ($iden > 6) break;
        }
        ?>
    </swiper-container>
</section>



<?php
include "components/footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
<script src="js/index.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/public.js"></script>
</body>
</html>