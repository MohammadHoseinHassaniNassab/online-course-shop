<?php
include "./components/connection.php";
$categories = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `categories` WHERE 1"),MYSQLI_ASSOC);
if (isset($_POST["btn_edid_prodouct"])) {
    $id = $_POST["id"];

    $DBname = $_POST["name"];
    $DBdescription = $_POST["description"];
    $DBprice = $_POST["price"];
    $DBstock = $_POST["stock"];

    mysqli_query($connection, "UPDATE `prodoucts` SET `name`='$DBname',`price`='$DBprice',`categorie`='$DBcategorie',`imgs_url`='$DBimgs',`description`='$DBdescription',`more_description`='$DB_more_description',`stock`='$DBstock', `colors`='$DBcolors', `size`='$DBsize' WHERE id = '$id'");
}
$id = $_GET["id"];
$prodouct = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `prodoucts` WHERE id = '$id'"), MYSQLI_ASSOC);

$img_url = $prodouct[0]["img_url"];
$stock = $prodouct[0]["stock"];
$check1 = "";
$check2 = "";
if ($stock == 1) {
    $check1 = "checked";
} else if ($stock == 0) {
    $check2 = "checked";
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
<body>
<?php
include "components/admin_panel_header.php";
?>



<div class="container-fluid float-xl-end w-xl-100" style="width: 80%">
    <form action="#" method="post" class="row" enctype="multipart/form-data">
        <input type="text" value="<?=$_GET["id"]?>" name="id" hidden>
        <div class="col-12 col-lg-4 d-flex flex-column align-items-center" id="parent">
                <div class="d-flex justify-content-center p-2 border-5 border-bottom">
                    <img src="<?=$img_url?>" class="w-50">
                </div>
            <textarea type="text" class="w-100 h-100" id="imgs-url" name="imgs_url" hidden><?=$prodouct[0]['imgs_url']?></textarea>
            <div class="d-flex justify-content-center p-2 border-5 border-bottom w-100">
                <input type="file" name="img_url_1" onchange="input_creator()" class="file-input form-control">
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <input type="text" class="my-3 fs-2 form-control" name="name" value="<?= $prodouct[0]["name"]?>">
            <textarea class="text-start mt-3 mt-lg-0 w-100 form-control" name="description">
                <?=$prodouct[0]["description"]?>
            </textarea>
            <select class="form-select mt-3" name="categorie">
                <?php
                foreach ($categories as $categorie) { if ($categorie["name"] == $prodouct[0]["categorie"]) {?>
                    <option value="<?=$categorie["name"]?>" selected><?=$categorie["name_pe"]?></option> <?php } else {?>
                    <option value="<?=$categorie["name"]?>"><?=$categorie["name_pe"]?></option> <?php } ?>
                <?php } ?>
            </select>

            <h4 class="mt-3">توضیحات بیشتر :</h4>
            <div class="w-100" style="display: <?=$hint_display?>" id="hint">
                <div class="w-25 ps-2"><h5>تیتر توضیح</h5></div>
                <div class="w-75 ps-2"><h5>بدنه توضیح</h5></div>
            </div>
            <div id="more_description_inputs_div">
                <input type="number" hidden name="more_description_input_names" id="more_description_input_names" value="<?=count($more_description)?>">
                <?php
                $iden = 1;
                foreach ($more_description as $item) { ?>
                    <div class="input-group w-100 mt-3">
                        <input class="form-control bg-light w-25" type="text" name="more_description_head_<?=$iden?>" value="<?=$item[0]?>">
                        <input class="form-control w-50" type="text" name="more_description_body_<?=$iden?>" value="<?=$item[1]?>">
                        <input type="button" class="btn btn-danger" value="حذف کردن سطر" onclick="row_remover(this)">
                    </div>
                <?php $iden++; } ?>
            </div>
            <div class="btn-group mt-3 w-100">
                <button type="button" class="btn btn-outline-success" id="btn_add_row">افزودن سطر</button>
                <button type="button" class="btn btn-outline-danger" id="btn_remove_row">پاک کردن سطر</button>
            </div>

            <input type="text" id="placeholder" value='<?=$colors?>'>
            <div>
                <h4 class="mt-3">رنگ بندی :</h4>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <input type="checkbox" name="color_red" id="red"  value="red" onchange="colors(this)">
                        <label for="color">قرمز</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_blue" id="blue" value="blue" onchange="colors(this)">
                        <label for="color">آبی</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_black" id="black" value="black" onchange="colors(this)">
                        <label for="color">مشکی</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_yellow" id="yellow" value="yellow" onchange="colors(this)">
                        <label for="color">زرد</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_green" id="green" value="green" onchange="colors(this)">
                        <label for="color">سبز</label>
                    </div>
                </div>
                <div>
                    <input type="text" name="prodouct_color" id="prodouct_color">
                </div>
            </div>

            <input type="text" id="placeholder_size" value='<?=$size?>'>
            <div>
                <h4 class="mt-3">سایز بندی :</h4>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <input type="checkbox" name="40" value="40" id="40" onchange="size_func(this)">
                        <label for="color">40</label>
                    </div>
                    <div>
                        <input type="checkbox" name="41" value="41" id="41" onchange="size_func(this)">
                        <label for="color">41</label>
                    </div>
                    <div>
                        <input type="checkbox" name="42" value="42" id="42" onchange="size_func(this)">
                        <label for="color">42</label>
                    </div>
                    <div>
                        <input type="checkbox" name="43" value="43" id="43" onchange="size_func(this)">
                        <label for="color">43</label>
                    </div>
                    <div>
                        <input type="checkbox" name="44" value="44" id="44" onchange="size_func(this)">
                        <label for="color">44</label>
                    </div>
                    <div>
                        <input type="checkbox" name="45" value="45" id="45" onchange="size_func(this)">
                        <label for="color">45</label>
                    </div>
                    <div>
                        <input type="checkbox" name="46" value="46" id="46" onchange="size_func(this)">
                        <label for="color">46</label>
                    </div>
                    <div>
                        <input type="checkbox" name="47" value="47" id="47" onchange="size_func(this)">
                        <label for="color">47</label>
                    </div>
                    <div>
                        <input type="checkbox" name="48" value="48" id="48" onchange="size_func(this)">
                        <label for="color">48</label>
                    </div>
                    <div>
                        <input type="checkbox" name="49" value="49" id="49" onchange="size_func(this)">
                        <label for="color">49</label>
                    </div>
                    <div>
                        <input type="checkbox" name="50" value="50" id="50" onchange="size_func(this)">
                        <label for="color">50</label>
                    </div>
                </div>
                <div>
                    <input type="text" name="prodouct_size" id="prodouct_size">
                </div>
            </div>


            <div class="bg-light w-100 p-3 rounded-5 mt-3">
                <div class="d-flex justify-content-around">
                    <h4>قیمت : </h4>
                    <div class="d-flex">
                        <sub class='text-danger fw-bold'> تومان </sub>
                        <input type="text" value="<?=$prodouct[0]["price"]?> " class="fs-4" name="price">
                    </div>
                </div>
                <div class="d-flex px-5 pt-2">
                    <span>ایا کالا موجود است؟</span>
                    <div class="ms-auto">
                        <input type="radio" name="stock" id="radio1" value="1" <?=$check1?>>
                        <label for="radio1">بله</label>
                        <input type="radio" name="stock" id="radio2" value="0" <?=$check2?>>
                        <label for="radio2">خیر</label>
                    </div>
                </div>
                <input type="submit" value="ثبت" class="btn btn-success w-100 mt-3 btn-lg" name="btn_edid_prodouct">
            </div>
        </div>
    </form>
</div>


<script src="js/admin_panel_edit_prodouct.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>