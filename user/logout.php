<?php

    include '../config.php';
    unset($_SESSION['user']);
    header("Location: index.php");

?>