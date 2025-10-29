<?php

  include 'config.php';

  if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $gmail = $_POST['email'];
    $subjct = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO message (`Name`,`Gmail_Id`,`Subject`,`Message`)
    VALUES ('$name','$gmail','$subjct','$message')";

    $result = mysqli_query($conn, $query);

    if($result){

      ?>
      <script> 
          alert('Your message has been sent. Thank you!')
          // swal("Good job.", "Your message has been sent. Thank you!", "success")
          location.replace("index.php")
      </script>
      <?php
    }
    else{
      ?>
      <script> 
          alert('Failed!')
          // swal("Oops!", "Failed", "error")
          location.replace("index.php")
      </script>
      <?php
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modern Bank</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <img src="./assets/img/logo.png" alt="" width="75px">
      <h1 class="logo me-auto"><a href="index.php">Modern Bank</a></h1>

      <!-- ======= .navbar ======= -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="login scrollto" href="user/index.php">Log In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  
  <!-- End Header -->


  <!-- ======= Hero Section ======= -->

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Welcome to our Modern Bank</h1>
          <h2>Welcome to Modern Bank, where banking meets innovation! We're thrilled to have you as part of our digital financial family. Experience seamless transactions, cutting-edge security, and personalized services tailored to your needs. Your financial journey begins here, reimagined for the modern world.</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
  
  <!-- End Hero -->


  <!-- ======= #main ======= -->

  <main id="main">

    <!-- ======= About Us Section ======= -->

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2> 
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              The Modern Bank is distinguished by its seamless integration of technology into every facet of its operations. Gone are the days of long queues, endless paperwork, and manual transactions. Instead, customers are greeted with user-friendly mobile apps and websites, offering a plethora of services at their fingertips. From balance inquiries to fund transfers, bill payments to investment opportunities, the modern bank has become a versatile digital hub catering to a spectrum of financial needs.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              The Modern Bank's physical presence has also undergone a makeover. Traditional brick-and-mortar branches have evolved into tech-savvy hubs, where customers can experience interactive displays, virtual reality consultations, and biometric authentication methods. These spaces prioritize customer engagement and education, offering workshops on financial literacy, digital security, and investment strategies.
            </p>
          </div>
        </div>

      </div>
    </section>
    
    <!-- End About Us Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>In the rapidly evolving landscape of financial technology and digital connectivity, Modern Bank services have undergone a remarkable transformation. Traditional brick-and-mortar banks are being complemented, and in some cases, replaced by innovative online platforms and mobile apps. This article explores a range of Modern Bank services that cater to the needs and preferences of today's tech-savvy customers.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <h4><a href="">Online Bankink</a></h4>
              <p>Online banking have become staples in modern financial services. Customers can access their accounts, make transactions, and even deposit checks using user-friendly website. Features such as two-factor authentication provide enhanced security, ensuring safe and convenient access to accounts.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <h4><a href="">Peer-to-Peer (P2P) Payments</a></h4>
              <p>P2P payment services allow individuals to transfer funds to friends, family, or acquaintances quickly and easily. These platforms, such as Venmo, PayPal, and Cash App, often include social features, allowing users to add comments or emojis to their transactions.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <h4><a href="">Contactless Banking</a></h4>
              <p>The COVID-19 pandemic accelerated the adoption of contactless banking services, including remote account opening, video consultations, and document signing. These services prioritize safety and convenience for both customers and bank employees.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <h4><a href="">Sustainable Banking</a></h4>
              <p>Many Modern Banks are focusing on sustainable and socially responsible banking practices. They offer services that align with customers' ethical values, such as investing in environmentally friendly projects or donating to charitable causes.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    
    <!-- End Services Section -->


    <!-- ======= Team Section ======= -->

    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Modern bank teams are comprised of diverse and specialized members who work collaboratively to ensure the efficient and effective operation of financial institutions in today's dynamic and technology-driven landscape. These teams have evolved to meet the changing needs of customers, advancements in financial technology, and the complex regulatory environment.</p>
        </div>

        <div class="row">

          <div class="col-lg-12 " data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-center justify-content-center">
              <div class="pic"><img src="assets/img/team/rayyan.jpg" class="img-fluid"alt=""></div>
              <div class="member-info">
                <h4>Syed Rayyan Ali</h4>
                <span>Chief Executive Officer (CEO)</span>
                <p>Mr. Syed Rayyan Ali, A visionary leader and CEO of Modern Bank, embodies excellence and innovation.</p>
                <div class="social">
                  <a href="https://github.com/rayyanali" target="_blank">
                    <i class="ri-github-fill"></i>
                  </a>
                  <a href="mailto:rayyanali@gmail.com? subject=Information about Modern Bank" target="_blank">
                    <i class="ri-mail-fill"></i>
                  </a>
                  <a href="https://www.instagram.com/rayyanali/?next=%2F" target="_blank">
                    <i class="ri-instagram-fill"></i>
                  </a>
                  <a href="https://www.linkedin.com/in/rayyanali-1b52b628a" target="_blank">
                    <i class="ri-linkedin-box-fill"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          
        </div>

      </div>
    </section>
    
    <!-- End Team Section -->


    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>We providing exceptional customer service and maintaining a strong connection with our valued users, we believe in making communication easy and efficient. Whether you have a question, feedback, or require assistance, our dedicated support team is here to help.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>123 ABC, Lucknow, 123456</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>modernbank@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+91 1234567890</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2515.317321741687!2d80.89779705575141!3d26.92900432177589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399956564d730943%3A0xa3f27afc8ce7218b!2z4KSW4KWN4KS14KS-4KSc4KS-IOCkruCli-Ckh-CkqOClgeCkpuCljeCkpuClgOCkqCDgpJrgpL_gpLbgpY3gpKTgpYAg4KSy4KWI4KSC4KSX4KWN4KS14KWH4KScIOCkr-ClgeCkqOCkv-CkteCksOCljeCkuOCkv-Ckn-ClgA!5e0!3m2!1shi!2sin!4v1691827450689!5m2!1shi!2sin" frameborder="0" width="100%" height="290" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="post" role="form" class="php-email-form" autocomplete="off">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
    
    <!-- End Contact Section -->

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
              123 ABC <br>
              Lucknow, 123456<br>
              Uttar Pradesh <br>
              <strong>Phone:</strong> +91 1234567890<br>
              <strong>Email:</strong> modernbank@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Online Bankink</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Peer-to-Peer (P2P) Payments</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Contactless Banking</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Sustainable Banking</a></li>
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
        Designed & Developed by <a href="index.php">Syed Rayyan Ali</a>
      </div>
    </div>
  </footer>
  
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>