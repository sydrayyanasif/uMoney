<?php
    include '../config.php';

    if(empty($_SESSION["admin"])){
        header("Location: index.php");
    }

    $admin = $_SESSION["admin"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE Id = '{$admin['adminId']}'");

    $row = mysqli_fetch_assoc($result);

    $file_name = basename($_SERVER['PHP_SELF']);
    $page = explode('.',$file_name);
    $title = current($page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title; ?> </title>

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- CSS File -->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <!-- JS File -->

    <script src="../assets/js/sub.js" async></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

    <script>
        function preventBack(){
            window.history.forward()
        };
        setTimeout("preventBack()",0);
        window.onunload=function(){
            null;
        }
    </script>

    <!-- ======= Header ======= -->

    <header>
        <div class="logo">
            <img src="../assets/img/logo.png" alt="">
            <a href="dashbord.php">
                <h3>
                    Modern Bank
                </h3>
            </a>
        </div>
        <h2>Welcome <?php echo $admin["adminName"]; ?> </h2>
        <img src="admin-img/<?php echo $row['Image_Name']; ?>" alt="" class="user-pic" onclick="toggleMenu()">
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="admin-img/<?php echo $row['Image_Name']; ?>" alt="">
                    <h3><?php echo $admin["adminName"]; ?></h3>
                </div>
                <hr>
                <a href="profile.php?ui=<?php echo $admin["adminId"]; ?>" class="sub-menu-link">
                    <i class="fa-solid fa-user"></i>
                    <p>Profile</p>
                </a>
                <a href="add-new-admin.php" class="sub-menu-link">
                    <i class="fa-solid fa-circle-plus"></i>
                    <p>Add New Admin</p>
                </a>
                <a href="message.php" class="sub-menu-link">
                    <i class="fa-solid fa-message"></i>
                    <p>Messages</p>
                </a>
                <a href="logout.php" class="sub-menu-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Logout</p>
                </a>
            </div>
        </div>
    </header>

    <!-- ======= End Header ======= -->

    <div class="main">

        <!-- ======= Side Navigation ======= -->

        <div class="side-nav">
            <a href="dashbord.php">
                <i class="fa-solid fa-gauge-high">
                    <span>Dashbord</span>
                </i>
            </a>
            <a href="add-new-account.php">
                <i class="fa-regular fa-circle">
                    <span>New Account</span>
                </i>
            </a>
            <a href="manage-account.php">
                <i class="fa-regular fa-circle">
                    <span>Manage Account</span>
                </i>
            </a>
            <a href="transaction.php">
                <i class="fa-regular fa-circle">
                    <span>Transactions</span>
                </i>
            </a>
            <a href="deposit.php">
                <i class="fa-regular fa-circle">
                    <span>Deposit</span>
                </i>
            </a>
            <a href="withdraw.php">
                <i class="fa-regular fa-circle">
                    <span>Withdraw</span>
                </i>
            </a>
            <a href="transfer.php">
                <i class="fa-regular fa-circle">
                    <span>Transfer</span>
                </i>
            </a>
        </div>

        <!-- ======= End Side Navigation ======= -->