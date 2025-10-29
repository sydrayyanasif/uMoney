<?php
    include '../config.php';

    $mid = $_GET['mid'];

    mysqli_query($conn, "DELETE FROM `message` WHERE Id = '$mid'");

    header("Location: message.php");
?>