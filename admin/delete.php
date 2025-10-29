<?php
    include '../config.php';

    $cid = $_GET['cid'];

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_Id = '$cid'");

    $row = mysqli_fetch_assoc($result);

    unlink("user-img/".$row['Image_Name']);

    mysqli_query($conn, "DELETE FROM customer WHERE Customer_Id = '$cid'");
    mysqli_query($conn, "DELETE FROM transaction WHERE Customer_Id = '$cid'");

    header("Location: manage-account.php");
?>