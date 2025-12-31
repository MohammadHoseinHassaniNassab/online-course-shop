<?php
//$all_price = 0;
//if (isset($_POST["submit_cart"])) {
//    $connection = mysqli_connect("localhost", "root", "", "silver_nafis");
//        $user_id = $_COOKIE["user_id"];
//        $DB_user_cart = mysqli_fetch_all(mysqli_query($connection, "SELECT `cart` FROM `users` WHERE id = $user_id"), MYSQLI_ASSOC);
//        $user_cart = json_decode($DB_user_cart[0]["cart"]);
//        if (!empty($user_cart)) {
//            foreach ($user_cart as $item)
//            {
//                $prodouct_id = $item[0];
//                $prodouct = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `prodoucts` WHERE id = '$prodouct_id'"), MYSQLI_ASSOC)[0];
//                $price = $prodouct["price"];
//                $count = $item[1];
//                $all_price += $price * $count;
//            }
//        }
//    $price =
//
//    $curl = curl_init();
//
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => 'https://api.zarinpal.com/pg/v4/payment/request.json',
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => '',
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 0,
//        CURLOPT_FOLLOWLOCATION => true,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => 'POST',
//        CURLOPT_POSTFIELDS => '{
//  "merchant_id": "c3a4bec8-f48d-4a64-9461-251681c8d7e1",
//  "amount": '.$all_price.',
//  "callback_url": "http://localhost/project2/cart.php",
//  "description": "Transaction description"
//}',
//        CURLOPT_HTTPHEADER => array(
//            'Content-Type: application/json',
//            'Accept: application/json'
//        ),
//    ));
//
//    $response = curl_exec($curl);
//    curl_close($curl);
//    $result = json_decode($response);
//    $result2 =  $result->data->authority;
//
//    header("location: https://www.zarinpal.com/pg/StartPay/".$result2);
//}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
</head>
<body>

<form method="get" action="verify_pay.php" class="w-100 d-flex align-items-center justify-content-center" style="height: 100vh">
    <button class="btn btn-success btn-lg" name="verified">تایید</button>
    <button class="btn btn-danger btn-lg" name="canceled">لغو</button>
</form>

</body>
</html>
