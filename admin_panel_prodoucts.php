<?php
include "./components/connection.php";
$prodoucts = mysqli_fetch_all(mysqli_query($connection,"SELECT * FROM `prodoucts` WHERE 1"), MYSQLI_ASSOC);
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
include "components/admin_panel_header.php";
?>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                ایا از حذف کردن کالای مورد نظر اطمینان دارید؟
            </div>
            <form class="modal-footer" method="post" action="./admin_panel_delete_prodouct.php">
                <input id="prodouct-id" name="id" type="text" hidden>
                <button type="submit" class="btn btn-primary">بله</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid float-xl-end">
    <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4 p-3 float-end w-xl-100" style="width: 80%;">
        <?php
        foreach ($prodoucts as $prodouct)
        {
            $id = $prodouct["id"];
            $name = $prodouct["name"];
            $img = $prodouct["img_url"];
            $price = $prodouct["price"];
            ?>
            <div class="col h-100 p-3">
                <div type='submit' class='card text-center rounded-4 hover-shadow p-1'>
                    <img src='<?=$img?>' class='card-img-top rounded-4'>
                    <div class='w-100'>
                        <h5 class='card-text text-start ms-1 mt-3'>
                            <?=$name?>
                        </h5>
                        <div class='d-flex justify-content-end me-1'>
                            <sub class='text-danger fw-bold'> تومان </sub>
                            <h6 class='price ms-1'><?=$price?></h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form class='' method='get' action='./admin_panel_edit_prodouct.php'>
                            <input name='id' value='<?=$id?>' class='d-none'>
                            <input type="submit" value="ویرایش" class="btn btn-warning m-2" name="btn_edit">
                        </form>
                        <form class='' method='get' action='#'>
                            <button type="button" class="btn btn-danger m-2 btn-delete" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="id_replace(this)"><span class="d-none"><?=$id?></span>حذف</button>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>



<script src="js/admin_panel_prodoucts.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>