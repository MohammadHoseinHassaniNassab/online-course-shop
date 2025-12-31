<?php
session_start();
include "./components/connection.php";
$search_value = $_GET["search_value"];
$prodoucts = mysqli_fetch_all(mysqli_query($connection,"SELECT * FROM `prodoucts` WHERE name LIKE '%$search_value%'"), MYSQLI_ASSOC);
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



<section class="container-lg py-5">
    <h2 class="fw-bolder">
        نتایج جستجو برای : <?=$_GET["search_value"]?>
    </h2>
    <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4 p-3">
        <?php

        if (count($prodoucts) >= 1) {
            foreach ($prodoucts as $prodouct)
            {
                $id = $prodouct["id"];
                $name = $prodouct["name"];
                $img = $prodouct["img_url"];
                $price = $prodouct["price"];
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
                <?php
            }
        } else { ?>
            <div class="alert alert-danger w-100 text-center fs-2 fw-bolder">محصولی با نام یا دسته بندی مورد نظر یافت نشد</div>
        <?php }
        ?>
    </div>
</section>




<?php
include "components/footer.php";
?>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/public.js"></script>
</body>
</html>