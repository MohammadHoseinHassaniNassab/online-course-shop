<?php
session_start();
include "./components/connection.php";
$all_price = 0;
if (isset($_GET["verified"])) {
    if (isset($_SESSION["is_user_logedin"]) || isset($_COOKIE["is_user_logedin"])) {
        $_SESSION["is_user_logedin"] = true;
        $_SESSION["user_user_name"] = $_COOKIE["user_user_name"];
        $_SESSION["user_password"] = $_COOKIE["user_password"];
        $_SESSION["user_id"] = $_COOKIE["user_id"];
        $user_id = $_SESSION["user_id"];
        $DB_user_cart = mysqli_fetch_all(mysqli_query($connection, "SELECT `cart` FROM `users` WHERE `id` = '$user_id'"), MYSQLI_ASSOC);
        $crouses = mysqli_fetch_all(mysqli_query($connection, "SELECT `rigestered_crouses` FROM `users` WHERE `id` = '$user_id'"), MYSQLI_ASSOC);
        $order_items = $DB_user_cart[0]["cart"];
        $user_cart = json_decode($DB_user_cart[0]["cart"]);
        foreach ($user_cart as $item) {
            $prodouct_id = $item;
            $prodouct = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `prodoucts` WHERE id = '$prodouct_id'"), MYSQLI_ASSOC)[0];
            $price = $prodouct["price"];
            $all_price += $price;
        }
        $user_crouses = json_decode($crouses[0]["rigestered_crouses"]);
        $all = array_merge($user_cart, $user_crouses);
        $DB_all = json_encode($all);
        mysqli_query($connection, "UPDATE `users` SET `rigestered_crouses`='$DB_all' WHERE `id`='$user_id'");
        mysqli_query($connection, "UPDATE `users` SET `cart`='[]'");
        include "./components/jdf.php";
        $time = jdate('Y-n-j');
        mysqli_query($connection, "INSERT INTO `orders`(`items`, `price`, `tarikh`, `buyer_user_id`) VALUES ('$order_items','$all_price','$time','$user_id')");
        header("location: ./cart.php");
    }
}
else {
    header("location: ./cart.php");
}