<?php

    include '../config.php';
    unset($_SESSION['admin']);
    header("Location: index.php");

?>