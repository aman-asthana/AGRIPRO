<?php
require_once __DIR__ . '/../config/connection.inc.php';

if (isset($_SESSION['USER_LOGIN']) == '') {
  header('location:../auth/adminlogin.php');
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agri Info | Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Title icon -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top" style="background-color: #5cf368">
    
  </div>

   <!-- ======= Top Bar ======= -->
   <div id="topbar" class="d-flex align-items-center fixed-top" style="background-color: #5cf368">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
      </div>
    </div>
  </div>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="adminindex.php"><img src="../../assets/img/logo.jpg" width="80px" height="80px"></a></h1>
     

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
       
       
        <li class="dropdown">My Profile<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="../auth/adminregister.php">Add Another Admin</a></li>
              <li><form class="d-flex">
                <h6 class="container mt-2">Hello! <?php echo $_SESSION['USER_LOGIN']; ?></h6>
                </form></li>
              <li><div class="d-flex align-item-center"><button type="button" class="btn btn-danger" onclick="showConfirmation()">Logout</button> <h2>&crarr;</h2></div>
      <script>
      	function showConfirmation(){
      		if(confirm("Are you want to logout...")){
      			window.location.href = "../auth/adminlogout.php";
      		}
      	}
      </script></li>
              
            </ul>
          </li>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#price">Price</a></li>
          <li><a class="nav-link scrollto" href="../views/onlyviewproduct.php">Product</a></li>
          <li><a class="nav-link scrollto" href="../views/onlyviewnews.php">Latest News</a></li>
          <li><a class="nav-link scrollto" href="updateprice.php">Update Price</a></li>
          <li><a class="nav-link scrollto" href="../views/newsinfo.php">Add News</a></li>
          <li><a class="nav-link scrollto" href="../views/productinfo.php">Add product</a></li>
          <!-- <li><a class="nav-link scrollto" href="#doctors"></a></li>
           -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1 style="color: rgb(47, 255, 158); ">Welcome to Agri Info</h1>
      <h2>We are team for providing the information about the crops</h2>

    </div>
  </section><!-- End Hero -->

<?php
// Fetch price data for display
$query = "SELECT * FROM price WHERE id='1'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// For $row2, we'll use the same data or you can create a separate query if needed
$row2 = $row; // Using same data, or modify as needed
?>

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">



      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="price" class="counts">
    
      <div class="container">
      <div class="section-title">
          <h2>Today's Price | <?php $dateFromDB = $row['date'];
                              // convert date string to timestamp
                              $timestamp = strtotime($dateFromDB);
                              // format the timestamp to desired format
                              $formattedDate = date('l d-M-Y', $timestamp);
                              // output the formatted date
                              echo $formattedDate; ?></h2>
        </div>
      
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="count-box">
            <i class="fa fa-inr"></i>
            <span class="fas fa-inr"><?php echo $row['wheat'] ?></span>
            <p><?php echo $row2['wheat'] ?></p>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fa fa-inr"></i>
              <span class="fa fa-inr "><?php echo $row['soyabean'] ?></span>
              <p><?php echo $row2['soyabean'] ?></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fa fa-inr"></i>
              <span class="fa fa-inr "><?php echo $row['toor'] ?></span>
              <p><?php echo $row2['toor'] ?></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-10">
            <div class="count-box">
              <i class="fas fa-inr"></i>
              <span class="fa fa-inr "><?php echo $row['chana'] ?></span>
              <p><?php echo $row2['chana'] ?></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-50">
            <div class="count-box">
              <i class="fas fa-inr"></i>
              <span class="fa fa-inr "><?php echo $row['chanav2'] ?></span>
              <p><?php echo $row2['chanav2'] ?></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-10">
            <div class="count-box">
              <i class="fas fa-inr"></i>
              <span class="fa fa-inr "><?php echo $row['cotton'] ?></span>
              <p><?php echo $row2['cotton'] ?></p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Counts Section -->

    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          
        </div>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
          

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>agriiinfo0@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+91 935 953 9232</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" style="background-color: #21D192" >Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-dark"
          style="background-color: #ECEFF1"
          >
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192">
      <!-- Left -->
      <div class="me-5">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        
        
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Agri info</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto"style="width: 60px; background-color: #7c4dff; height: 2px"/>
            <p>
              we give you the information of crops product, news, price, etc
            </p><br>
            <h6 class="text-uppercase fw-bold"><a href="about.php" class="text-dark">About Us</a></h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto"style="width: 60px; background-color: #7c4dff; height: 2px"/>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Services</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
            <p>
              <a href="#price" class="text-dark">Price</a>
            </p>
            <p>
              <a href="onlyviewproduct.php" class="text-dark">Product</a>
            </p>
            <p>
              <a href="onlyviewnews.php" class="text-dark">News</a>
            </p>
            
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Useful links</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
            <p>
              <a href="https://www.corporate.agrostar.in/" class="text-dark">Agrostar</a>
            </p>
            <p>
              <a href="https://agricoop.nic.in/" class="text-dark">Agricoop</a>
            </p>
            <p>
              <a href="https://farmer.gov.in/" class="text-dark">Farmer.gov</a>
            </p>
            
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fas fa-envelope mr-3"></i> agriiinfo00@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 91 935 953 9232</p>
            
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-1"
         style="background-color: #21D192"
         >
      © 2023 Copyright:<a class="text-dark" href="index.php">AGRI INFO</a><br><br>
      <p><a href="login.php" style="font-color: black;" target="_blank" class="text-dark">USER LOGIN</a></p>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
<!-- End Footer -->

  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>