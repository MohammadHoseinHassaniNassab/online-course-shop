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
$id = $_GET["id"];
$video_urls = [];
$prodouct = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM prodoucts WHERE id = '$id'"), MYSQLI_ASSOC);
$titles = json_decode($prodouct[0]["titles"]);
if (isset($_SESSION["is_user_logedin"], $_COOKIE["is_user_logedin"])) {
    $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$user_id'"), MYSQLI_ASSOC);
    $DB_crouses = json_decode($result[0]["rigestered_crouses"]);
    foreach ($DB_crouses as $item) {
        if ($item == $id) {
            $video_urls = json_decode($prodouct[0]["videos_url"]);
        }
    }
}
$add = "block";
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
    <style>
            :root {
                --plyr-color-main: #9710b4;
            }
    </style>
</head>
<body>
<?php
include "components/header.php";
?>


<section class="container-xl my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-8 d-flex flex-column align-items-center align-items-lg-end">
            <div class="w-100">
                <video controls crossorigin playsinline class="main">
                    <source src="./videos/fbcd21afd3d91e1fc9b693311a5f59af62681230-144p.mp4" type="video/mp4">
                </video>
            </div>
            <div class="text-start mt-3 mt-lg-0">
                <?php
                $description = explode("\\", $prodouct[0]["description"]);
                foreach ($description as $sentence){
                    echo $sentence;
                    ?>
                    <br>
                    <?php
                }
                ?>
            </div>

            <div class="w-100 d-flex justify-content-center mt-5">
                <div class="w-75">
                    <?php
                    if (!empty($video_urls)) {
                        $i7 = 0;
                        foreach ($titles as $item) { $url = $video_urls[$i7]; ?>
                            <form class="bg-light border border-secondary fs-5 p-2 rounded-top-1" method="post" action="video_player.php">
                                <input type="text" value="<?=$url?>" name="video_url" hidden>
                                <input type="text" value="<?=$id?>" name="crouse_id" hidden>
                                <input type="text" value="<?=$item?>" name="title" hidden>
                                <button href="" type="submit" class="nav-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2M3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1z"/>
                                    </svg>
                                    <?=$item?>
                                </button>
                            </form>

                        <?php $i7++; }
                        ?>
                    <?php } else {
                        $i8 = 0;
                        foreach ($titles as $item) {
                            if ($i8 == 0){ $url = json_decode($prodouct[0]["videos_url"]); ?>
                                <form class="bg-light border border-secondary fs-5 p-2 rounded-top-1" method="post" action="video_player.php">
                                    <input type="text" value="<?=$url[0]?>" name="video_url" hidden>
                                    <input type="text" value="<?=$id?>" name="crouse_id" hidden>
                                    <input type="text" value="<?=$item?>" name="title" hidden>
                                    <input type="checkbox" name="first_video" hidden checked>
                                    <button href="" type="submit" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2M3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1z"/>
                                        </svg>
                                        <?=$item?>
                                    </button>
                                </form>
                            <?php } else { ?>
                                <div class="bg-light border border-secondary fs-5 p-2 rounded-top-1">
                                    <a href="" class="disabled nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                        </svg>
                                        <?=$item?>
                                    </a>
                                </div>
                            <?php  } $i8++; } }?>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">

            <form class="bg-white w-100 p-3 rounded-5 mt-3 position-sticky" style="top: 100px; z-index: 10;" action="add_to_cart.php" method="post">

                <h2 class="text-center text-lg-start mt-3 mt-lg-0"><?=$prodouct[0]["name"]?></h2>
                <a href="http://localhost/lebaseton/prodouct.php?id=47" target="_blank" rel="noopener border">اشتراک گذاری در فیسبوک</a>

                <div>
                    <input type="text" value="<?=$_GET["id"]?>" name="id" hidden>
                </div>
                <div class="d-flex justify-content-around">
                    <h4>قیمت : </h4>
                    <div class="d-flex">
                        <sub class='text-danger fw-bold'> تومان </sub>
                        <h4 class="price"><?=$prodouct[0]["price"]?></h4>
                    </div>
                </div>

                <div>
                    <?php if ($prodouct[0]["stock"] == 1) {
                        if (isset($_SESSION["is_user_logedin"], $_COOKIE["is_user_logedin"])) {
                            $user_id = $_COOKIE["user_id"];
                            $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$user_id'"), MYSQLI_ASSOC);
                            $DB_cart = json_decode($result[0]["cart"]);
                            $DB_crouses = json_decode($result[0]["rigestered_crouses"]);
                            $sec = true;
                            foreach ($DB_crouses as $item2) {
                                if ($item2 == $id) { ?>
                                    <button class="btn btn-lg btn-success w-100" type="button">در دوره شرکت کرده اید</button>
                                <?php $sec = false;
                                    $add = "none"; break;} else {
                                    $sec = true;
                                }
                            }
                            if ($sec) {
                                $i5 = 0;
                                foreach ($DB_cart as $item) { $i3 = 0;
                                    if ($item == $id) { $add = "none"; ?>
                                        <button class="btn btn-lg btn-success w-100" type="button">دوره در سبد خرید موجود می باشد</button>
                                    <?php }
                                    $i5++;
                                }
                            }
                            ?>
                        <?php } else { $add = "none";?>
                            <button class="btn btn-lg btn-primary w-100" id="btn-add-to-cart" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">افزودن به سبد خرید</button>
                        <?php } ?>
                    <?php } else { ?>
                        <button class="btn btn-lg btn-secondary w-100 disabled" type="button" disabled>کالا ناموحود است</button>
                    <?php } ?>
                    <button class="btn btn-lg btn-primary w-100" style="display: <?=$add?>" id="btn-add-to-cart" type="submit" name="btn_add_to_cart">افزودن به سبد خرید</button>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                برای افزودن محصول به سبد خرید ابتدا باید به حساب کاربری خود وارد شوید
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="login.php">ورود به حساب کاربری</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
            </div>
        </div>
    </div>
</div>



<div class="container mb-5">
    <h2 class="mb-5"><span class="fs-2 border-danger border-5 border-bottom">سوالات متداول</span></h2>
    <div class="accordion accordion-flush border" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    نحوه خرید
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    نماد اعتماد
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    ایا پس از پرداخت امکان مرجوعی وجود دارد؟
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"></div>
            </div>
        </div>
    </div>

</div>


<?php
include "components/footer.php";
?>
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<!--<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>-->
<script>
    const player = new Plyr('video');
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="./js/prodouct.js"></script>
<script src="js/public.js"></script>
</body>
</html>