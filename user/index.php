<?php

  include '../config.php';

  if(!empty($_SESSION["user"])){
    header("Location: dashbord.php");
  }

  if(isset($_POST['submit'])){

    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Gmail_Id = '$gmail' AND Mobile_Number = '$password'");

    $rows = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0 ){

      $userArr= array("userId"=>$rows["Customer_Id"],"userName"=>$rows["Name"]);
      $_SESSION['user']=$userArr;

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

    <title>User Log In</title>
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

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/log-in.css">

  </head>

  <body>

    <!-- ======= Header ======= -->

    <header id="header" class="fixed-top header-inner-pages">
      <div class="container d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="" width="75px">
        <h1 class="logo me-auto"><a href="index.php">Modern Bank</a></h1>

        <!-- ======= .navbar ======= -->

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <a class="nav-link scrollto " href="../index.php">Home</a>
            </li>
            <li>
              <a class="nav-link scrollto" href="../index.php#about">About</a>
            </li>
            <li>
              <a class="nav-link scrollto" href="../index.php#services">Services</a>
            </li>
            <li>
              <a class="nav-link scrollto" href="../index.php#team">Team</a>
            </li>
            <li>
              <a class="nav-link scrollto" href="../index.php#contact">Contact</a>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        
        <!-- .navbar -->

      </div>
    </header>
    
    <!-- End Header -->


    <!-- ======= #main ======= -->

    <main id="main">
      <div class="box">
        <span class="borderLine"></span>
        <form action="" method="post" autocomplete="off">
          <h2>User Log In</h2>
          <div class="inputBox">
            <input type="text" name="gmail" required="required">
            <span>Gmail Id</span>
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
      
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Modern Bank</h3>
              <p>
                182 ABC <br>
                Lucknow, 226013<br>
                Uttar Pradesh <br>
                <strong>Phone:</strong> +91 8923080809<br>
                <strong>Email:</strong> modernbank@gmail.com<br>
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#hero">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#about">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#services">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#team">Team</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#services">Online Bankink</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#services">Peer-to-Peer (P2P) Payments</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#services">Contactless Banking</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="../index.php#services">Sustainable Banking</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Social Networks</h4>
              <p>Reach out to us via our social media platforms: (Twitter, Facebook, Instagram, Linkedin). Send us a direct message and we'll be sure to respond.</p>
              <div class="social-links mt-3">
                <a href="https://github.com/rayyanali" class="github" target="_blank">
                  <i class="bx bxl-github"></i>
                </a>
                <a href="mailto:rayyanali@gmail.com? subject=Information about Modern Bank" target="_blank">
                  <i class="ri-mail-fill"></i>
                </a>
                <a href="https://www.instagram.com/rayyanali/?next=%2F" class="instagram" target="_blank">
                  <i class="bx bxl-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/rayyanali-1b52b628a" class="linkedin" target="_blank">
                  <i class="bx bxl-linkedin"></i>
                </a>
                <!-- <a href="#" class="google-plus">
                  <i class="bx bxl-skype"></i>
                </a> -->
              </div>
            </div>

          </div>
        </div>
      </div>

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