<?php
include "./components/connection.php";
$categories = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `categories` WHERE 1"),MYSQLI_ASSOC);
if (isset($_POST["btn_add_prodouct"])) {
            $number = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `number` WHERE 1"),MYSQLI_ASSOC);
            $file = $_FILES["img"];
            $file_dir = "./img/".($number[0]["number"] + 1).".jpg";
            move_uploaded_file($file, $file_dir);
            $DBnum = $number[0]['number'] + 1;
            mysqli_query($connection, "UPDATE `number` SET `number`='$DBnum' WHERE 1");

    $DBname = $_POST["name"];
    $DBdescription = $_POST["description"];
    $DBprice = $_POST["price"];
    $DBimg = $file_dir;
    mysqli_query($connection, "INSERT INTO `prodoucts` SET `name`='$DBname',`price`='$DBprice',`img_url`='$DBimg',`description`='$DBdescription'");
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
        <div class="col-12 col-lg-4 d-flex flex-column align-items-center" id="parent">
            <h1 class="my-3 text-muted">تصاویر کالا را اپلود کنید :</h1>
            <div class="d-flex justify-content-center p-2 border-5 border-bottom w-100">
                <input type="file" name="img_url_1" onchange="input_creator()" class="file-input form-control" required>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <input type="text" class="my-3 fs-2 form-control" name="name" placeholder="نام کالا را وارد کنید :" required>
            <textarea class="text-start mt-3 mt-lg-0 w-100 form-control" name="description" placeholder="توضیحات درباره کالا را وارد کنید :" required></textarea>
            <select class="form-control form-select mt-3" name="categorie" required>
                <option selected disabled>دسته بندی را انتخاب کنید :</option>
                <?php
                foreach ($categories as $categorie) { ?>
                    <option value="<?=$categorie["name"]?>"><?=$categorie["name_pe"]?></option>
                <?php } ?>
            </select>

            <h4 class="mt-3">توضیحات بیشتر :</h4>
            <div class="w-100" style="display: none;" id="hint">
                <div class="w-25 ps-2"><h5>تیتر توضیح</h5></div>
                <div class="w-75 ps-2"><h5>بدنه توضیح</h5></div>
            </div>
            <div id="more_description_inputs_div">
                <input type="text" hidden name="more_description_input_names" id="more_description_input_names" value="0">
            </div>
            <div class="btn-group mt-3 w-100">
                <button type="button" class="btn btn-outline-success" id="btn_add_row">افزودن ستر</button>
                <button type="button" class="btn btn-outline-danger" id="btn_remove_row">پاک کردن ستر</button>
            </div>

            <div>
                <h4 class="mt-3">رنگ بندی :</h4>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <input type="checkbox" name="color_red" value="red" onchange="colors(this)">
                        <label for="color">قرمز</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_blue"  value="blue" onchange="colors(this)">
                        <label for="color">آبی</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_black" value="black" onchange="colors(this)">
                        <label for="color">مشکی</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_yellow" value="yellow" onchange="colors(this)">
                        <label for="color">زرد</label>
                    </div>
                    <div>
                        <input type="checkbox" name="color_green" value="green" onchange="colors(this)">
                        <label for="color">سبز</label>
                    </div>
                </div>
                <div>
                    <input type="text" name="prodouct_color" id="prodouct_color" hidden>
                </div>
            </div>

            <div>
                <h4 class="mt-3">سایز بندی :</h4>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <input type="checkbox" name="40" value="40" onchange="size_func(this)">
                        <label for="color">40</label>
                    </div>
                    <div>
                        <input type="checkbox" name="41" value="41" onchange="size_func(this)">
                        <label for="color">41</label>
                    </div>
                    <div>
                        <input type="checkbox" name="42" value="42" onchange="size_func(this)">
                        <label for="color">42</label>
                    </div>
                    <div>
                        <input type="checkbox" name="43" value="43" onchange="size_func(this)">
                        <label for="color">43</label>
                    </div>
                    <div>
                        <input type="checkbox" name="44" value="44" onchange="size_func(this)">
                        <label for="color">44</label>
                    </div>
                    <div>
                        <input type="checkbox" name="45" value="45" onchange="size_func(this)">
                        <label for="color">45</label>
                    </div>
                    <div>
                        <input type="checkbox" name="46" value="46" onchange="size_func(this)">
                        <label for="color">46</label>
                    </div>
                    <div>
                        <input type="checkbox" name="47" value="47" onchange="size_func(this)">
                        <label for="color">47</label>
                    </div>
                    <div>
                        <input type="checkbox" name="48" value="48" onchange="size_func(this)">
                        <label for="color">48</label>
                    </div>
                    <div>
                        <input type="checkbox" name="49" value="49" onchange="size_func(this)">
                        <label for="color">49</label>
                    </div>
                    <div>
                        <input type="checkbox" name="50" value="50" onchange="size_func(this)">
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
                        <input type="text" class="fs-4" name="price" required>
                    </div>
                </div>
                <div class="d-flex px-5 pt-2">
                    <span>ایا کالا موجود است؟</span>
                    <div class="ms-auto">
                        <input type="radio" name="stock" id="radio1" value="1" checked>
                        <label for="radio1">بله</label>
                        <input type="radio" name="stock" id="radio2" value="0">
                        <label for="radio2">خیر</label>
                    </div>
                </div>
                <input type="submit" value="ثبت" class="btn btn-success w-100 mt-3 btn-lg" name="btn_add_prodouct">
            </div>
        </div>
    </form>
</div>


<script src="js/admin_panel_add_prodouct.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>