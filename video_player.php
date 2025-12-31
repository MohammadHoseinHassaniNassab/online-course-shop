<?php
include "./components/connection.php";
$user_id = $_COOKIE["user_id"];
$id = $_POST["crouse_id"];
$url = "";

if (isset($_POST["first_video"])) {
    $url = $_POST["video_url"];
} else {
    if (isset($_COOKIE["is_user_logedin"])) {
        $result = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$user_id'"), MYSQLI_ASSOC);
        $DB_crouses = json_decode($result[0]["rigestered_crouses"]);
        foreach ($DB_crouses as $item) {
            if ($item == $id) {
                $url = $_POST["video_url"];
            }
        }
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
</head>
<body style="background: #2f2f2f; height: 100vh; width: 100%; display: flex; justify-content: center; align-items: center;" class="flex-column">

<h1 class="fw-bolder text-white"><?=$_POST["title"]?></h1>
<video src="<?=$url?>" controls style="width: 70%;"></video>

</body>
</html>
