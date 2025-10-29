<?php

  include '../config.php';

  if(!empty($_SESSION["admin"])){
    header("Location: dashbord.php");
  }

  if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE User_Name = '$username' AND Password = '$password'");

    $rows = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0 ){


      $adminArr= array("adminId"=>$rows["Id"],"adminName"=>$rows["Name"]);
      $_SESSION['admin']=$adminArr;

      header("Location: dashbord.php");

    }
    else{
      echo "<script> alert('Invalid User Name or Password')</script>";
      // echo "<script> swal('Oops!', 'Invalid User Name or Password', 'error'); </script>";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Log In</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/log-in.css">

  </head>

  <body>

    <!-- ======= Header ======= -->

    <header id="header" class="fixed-top header-inner-pages">
      <div class="container d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="" width="75px">
        <h1 class="logo me-auto"><a href="index.php">Modern Bank</a></h1>
      </div>
    </header>
    
    <!-- End Header -->


    <!-- ======= #main ======= -->

    <main id="main">
      <div class="box">
        <span class="borderLine"></span>
        <form action="" method="post" autocomplete="off">
          <h2>Admin Log In</h2>
          <div class="inputBox">
            <input type="text" name="username" required="required">
            <span>User Name</span>
            <i></i>
          </div>
          <div class="inputBox">
            <input type="password" name="password" required="required">
            <span>Password</span>
            <i></i>
          </div>
          <input type="submit" value="Login" name="submit">
        </form>
      </div>
    </main>
    
    <!-- End #main -->


    <!-- ======= Footer ======= -->

    <footer id="footer">

      <div class="container footer-bottom clearfix">
        <div class="copyright">
          &copy; Copyright <strong><span>Modern Bank</span></strong>
        </div>
        <div class="credits">
          Designed & Developed by <a href="index.php">Syed Rayyan Ali </a>
        </div>
      </div>

    </footer>
  
    <!-- End Footer -->

  </body>

</html>