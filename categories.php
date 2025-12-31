<?php
include "./components/connection.php";
$categorie = $_GET["categorie"];
$prodoucts = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `prodoucts` WHERE categorie = '$categorie'"),MYSQLI_ASSOC);
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



<section class="container-lg py-3">
    <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4 p-3">
        <?php
        foreach ($prodoucts as $prodouct)
        {
            $id = $prodouct["id"];
            $name = str_split($prodouct["name"]);
            $img = json_decode($prodouct["imgs_url"]);
            $price = $prodouct["price"];
            ?>

            <form class='col h-100 my-3' method='get' action='prodouct.php'>
                <input name='id' value='<?=$id?>' class='d-none'>
                <button type='submit' class='card text-center rounded-4 hover-shadow'>
                    <img src=<?=$img[0]?> class='card-img-top rounded-4'>
                    <div class='w-100'>
                        <h5 class='card-text text-start ms-1 mt-3'>
                            <?php
                            $i = 1;
                            foreach ($name as $char){
                                if ($i <= 45){
                                    echo $char;
                                } else {
                                    echo "...";
                                    break;
                                }
                                $i++;
                            }
                            ?>
                        </h5>
                        <div class='d-flex justify-content-end me-1'>
                            <sub class='text-danger fw-bold'> تومان </sub>
                            <h6 class='price ms-1'><?=$price?></h6>
                        </div>
                    </div>
                </button>
            </form>
            <?php
        }
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