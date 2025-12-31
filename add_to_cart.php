<?php
session_start();
if (isset($_SESSION["is_user_logedin"]) || isset($_COOKIE["is_user_logedin"])) {
    $_SESSION["is_user_logedin"] = true;
    $_SESSION["user_user_name"] = $_COOKIE["user_user_name"];
    $_SESSION["user_password"] = $_COOKIE["user_password"];
    $_SESSION["user_id"] = $_COOKIE["user_id"];
}
include "./components/connection.php";
if (isset($_POST["btn_add_to_cart"])) {
    $user_id = $_COOKIE["user_id"];
    $user_cart = mysqli_fetch_all(mysqli_query($connection, "SELECT `cart` FROM `users` WHERE `id`='$user_id'"), MYSQLI_ASSOC);
    if (empty($user_cart[0]["cart"])) {
        $id = $_POST["id"];
        $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE id = $user_id"),MYSQLI_ASSOC);
        $add_prodouct = [$id];
        $cart = json_encode($add_prodouct);
        mysqli_query($connection, "UPDATE `users` SET `cart`='$cart' WHERE id = '$user_id'");
    } else {
        $id = $_POST["id"];
        $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE id = $user_id"),MYSQLI_ASSOC);
        $curent_prodouct = [$id];
        $user_DB_cart = json_decode($result[0]["cart"]);
        $add_prodouct = array_merge($curent_prodouct, $user_DB_cart);
        $cart = json_encode($add_prodouct);
        mysqli_query($connection, "UPDATE `users` SET `cart`='$cart' WHERE id = '$user_id'");
    }
    header("location: ./prodouct.php?id=".$id);
}
if (isset($_POST["btn_remove_to_cart"])) {
    $user_id = $_SESSION["user_id"];
    $id = $_POST["id"];
    $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE id = $user_id"),MYSQLI_ASSOC);
    if (!empty($result[0]["cart"])) {
        $i = 0;
        $DB_cart = json_decode($result[0]["cart"]);
        foreach ($DB_cart as $item) {
            if ($item == $id) {
                array_splice($DB_cart, $i, 1);
                $new_cart = json_encode($DB_cart);
                mysqli_query($connection, "UPDATE `users` SET `cart`='$new_cart' WHERE id = '$user_id'");
            }
            $i++;
        }
    }
    header("location: ./cart.php");
}