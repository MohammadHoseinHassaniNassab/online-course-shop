<?php
include "./components/connection.php";
$id = $_POST["id"];
mysqli_query($connection, "DELETE FROM `prodoucts` WHERE id = '$id'");
header("location: http://localhost/project2/admin_panel_prodoucts.php");
?>