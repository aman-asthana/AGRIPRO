<?php
require_once __DIR__ . '/../config/connection.inc.php';
?>
<!doctype html>
<html lang="en">
  <head>



  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agri Info</title>
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

<body><br><br><br><br><br><br>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top" style="background-color: #5cf368">
    
  </div>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../admin/adminindex.php"><img src="../../assets/img/logo.jpg" width="80px" height="80px"></a></h1>
     

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
       
       
        <li class="dropdown">My Profile<i class="bi bi-chevron-down"></i></a>
            <ul>
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






          <li><a class="nav-link scrollto" href="../admin/adminindex.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../admin/adminindex.php#price">Price</a></li>
          <li><a class="nav-link scrollto" href="onlyviewproduct.php">Product</a></li>
          <li><a class="nav-link scrollto" href="onlyviewnews.php">Latest News</a></li>
          <li><a class="nav-link scrollto" href="../admin/updateprice.php">Update Price</a></li>
          <li><a class="nav-link scrollto active" href="newsinfo.php">Add News</a></li>
          <li><a class="nav-link scrollto" href="productinfo.php">Add product</a></li>
          <li><a class="nav-link scrollto" href="../admin/adminindex.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      

    </div>
  </header><!-- End Header -->




    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View News Details 
                            <a href="newsinfo.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $news_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM news WHERE id='$news_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $new = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>News Content</label>
                                        <p class="form-control">
                                            <?=$new['newsc'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date</label>
                                        <p class="form-control">
                                            <?=$new['date'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>News Type</label>
                                        <p class="form-control">
                                            <?=$new['ntype'];?>
                                        </p>
                                    </div>
                                    

                                <?php
                                
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
            <h6 class="text-uppercase fw-bold"><a href="../../public/index.php#about" class="text-dark">About Us</a></h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto"style="width: 60px; background-color: #7c4dff; height: 2px"/>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Services</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
            <p>
              <a href="../../public/index.php#price" class="text-dark">Price</a>
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
      © 2023 Copyright:<a class="text-dark" href="../../public/index.php">AGRI INFO</a><br><br>
      <p><a href="../auth/login.php" style="font-color: black;" target="_blank" class="text-dark">USER LOGIN</a></p>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>










