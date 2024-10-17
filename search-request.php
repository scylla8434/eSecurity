<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eSecurityKenya</title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="css/nice-select.css"/>
  <link rel="stylesheet" href="css/slicknav.min.css"/>
  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="css/style.css"/>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>eSecurityKenya<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li class="dropdown"><a href="#"><span><strong>Options</strong></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="index.php" class="">Home</a></li>
            </ul>
          </li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
      <div class="container">
  			<div class="row">
  				<div class="col-lg-7 m-auto text-black">
          <p><h3 class="col-lg-7 m-auto text-black">Search Request</h3></p><br>
          <form class="singup-form contact-form" method="post">
            <div class="row">
              <div class="col-md-12">
                <label style="padding-bottom: 10px;">Search Booking</label>
                <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter Your Booking Number">
              </div>
              <br>
              <div class="col-md-12">
                 <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
              </div>
            </div>
          </form>
  			</div>
  		</div>
      </div>
      <div class="form-body">
                        <?php
      if(isset($_POST['search']))
      {

      $sdata=$_POST['searchdata'];
        ?>
        <h4 align="center"><span class="badge badge-dark">Result for Booking Number "<?php echo $sdata;?>"</span> </h4>
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Booking Number</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact Number</th>
                          <th>Status</th>
                          <th>Name of Guard</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
      $sql="SELECT * from tblhiring where BookingNumber like '$sdata%'";
      $query = $dbh -> prepare($sql);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);

      $cnt=1;
      if($query->rowCount() > 0)
      {
      foreach($results as $row)
      {               ?>
                        <tr>
                          <td><?php echo htmlentities($cnt);?></td>
                          <td><?php  echo htmlentities($row->BookingNumber);?></td>
                          <td><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?>
                          </td>
                          <td><?php  echo htmlentities($row->Email);?></td>
                          <td> <?php  echo htmlentities($row->MobileNumber);?></td>
                          <?php if($row->Status==""){ ?>
                           <td><span class="badge badge-info"><?php echo "Not Updated Yet"; ?></span></td>


      <?php } else { ?>
                                              <td>
                                                  <span class="badge badge-info"><?php  echo htmlentities($row->Status);?></span>
                                              </td>
      <?php } ?>
      <?php if($row->Status==""){ ?>
       	 <td><?php echo "Not Updated Yet"; ?></td>
       	<?php } ?>
       <?php if($row->Status=="Rejected"){ ?>
       	 <td><?php echo "Rejected"; ?></td>
       	 <?php } else { ?>
                          <td> <?php  echo htmlentities($row->GuardAssign);?></td><?php } ?>
                        </tr>
                        </tbody>

                        <?php
      $cnt=$cnt+1;
      } } else { ?>
        <tr>
          <td colspan="8">   <span class="badge badge-warning">No record found against this search</span></td>

        </tr>
        <?php } }?>


                      </table>

                    </div>

  </section>
  <!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- ======= Footer ======= -->

</body>

</html>
