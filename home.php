<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
 if(isset($_POST['submit']))
  {

$booknum=mt_rand(100000000, 999999999);
     $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobnum=$_POST['mobnum'];
    $add=$_POST['add'];
   $reqnum=$_POST['reqnum'];
   $shift=$_POST['shift'];
   $gender=$_POST['gender'];

$sql="insert into tblhiring(BookingNumber,FirstName,LastName,Email,MobileNumber,Address,RequirementNumber,Shift,Gender)values(:booknum,:fname,:lname,:email,:mobnum,:add,:reqnum,:shift,:gender)";
$query=$dbh->prepare($sql);
$query->bindParam(':booknum',$booknum,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':reqnum',$reqnum,PDO::PARAM_STR);
$query->bindParam(':shift',$shift,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
   echo '<script>alert("Request is successful. Your Booking Number is "+"'.$booknum.'"+" Use this number to track your request. Thank You!")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <script>
    function validateForm() {
      // Validate First Name
      var fname = document.getElementById("fname").value;
      if (fname.trim() === "") {
        alert("Please enter your First Name.");
        return false;
      }

      // Validate Last Name
      var lname = document.getElementById("lname").value;
      if (lname.trim() === "") {
        alert("Please enter your Last Name.");
        return false;
      }

      // Validate Email
      var email = document.getElementById("email").value;
      var emailRegex = /^\S+@\S+\.\S+$/;
      if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      // Validate Phone Number
      var mobnum = document.getElementById("mobnum").value;
      if (mobnum.trim() === "" || mobnum.length !== 10 || isNaN(mobnum)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
      }

      // Validate Requirement Number
      var reqnum = document.getElementById("reqnum").value;
      if (reqnum.trim() === "" || !(/^\d+$/.test(reqnum))) {
        alert("Please enter a valid integer for Requirement Number.");
        return false;
      }

      // Validate Shift
      var shift = document.getElementById("shift").value;
      if (shift.trim() === "") {
        alert("Please choose a Shift.");
        return false;
      }

      // Validate Gender
      var gender = document.getElementById("gender").value;
      if (gender.trim() === "") {
        alert("Please choose a Gender.");
        return false;
      }

      // Validate Address
      var add = document.getElementById("add").value;
      if (add.trim() === "") {
        alert("Please enter your Address.");
        return false;
      }

      return true;
    }
  </script>
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

          <li class="dropdown"><a href="#"><span>Options</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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
          <p><h3 class="col-lg-7 m-auto text-black">Fill in the form below</h3></p><br>
          <form class="singup-form contact-form" method="post" onsubmit="return validateForm();">

  						<div class="row">
  							<div class="col-md-12">
  								<label style="padding-bottom: 10px;">First Name</label>
  								<input type="text" placeholder="First Name" name="fname"  class="form-control" required="true">
  							</div>
  							<div class="col-md-12">
  								<label style="padding-bottom: 10px;">Last Name</label>
  								<input type="text" placeholder="Last Name" name="lname" class="form-control" required="true">
  							</div>
  							<div class="col-md-12">
  								<label style="padding-bottom: 10px;">Your Email</label>
  								<input type="text" placeholder="Your Email" name="email" class="form-control" required="true">
  							</div>
  							<div class="col-md-12">
  								<label style="padding-bottom: 10px;">Phone Number</label>
  								<input type="text" placeholder="Phone Number" class="form-control" name="mobnum" required="true" maxlength="10" pattern="[0-9]+">
  							</div>
  							<div class="col-md-12">
  								<label style="padding-bottom: 10px;">Required Number of Number of Guards</label>
  								<input type="text" placeholder="Requirement Number" name="reqnum" class="form-control" required="true">
  							</div>
  							<div class="col-md-12">
  								<label style="padding-bottom: 10px;">Shift Requirement</label>

  								<select name="shift" required="true" class="form-control">
  									<option value="">Choose Shift</option>
  									<option value="Day">Day</option>
  									<option value="Night">Night</option>
  									<option value="24hrs">24hrs</option>
  								</select>
  							</div>
  							<div class="col-md-12">
  								<label style="padding-top: 10px;">Gender</label>
  								<select name="gender" required="true" class="form-control">
  									<option value="">Choose Gender</option>
  									<option value="Male">Male</option>
  									<option value="Female">Female</option>
  								</select>
  							</div>
  							<br>
  							<div class="col-md-12">
  								<label style="padding-top: 10px;">Address</label>
  								<textarea placeholder="Enter Address" name="add" required="true"></textarea>
                  <br>
  								 <input type="submit" class="btn btn-primary" value="send" name="submit">
  							</div>
  						</div>
  					</form>

  			</div>
  		</div>
    </div>
  </section>


        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">


    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>eSecurityKenya</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->

          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->
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

</body>

</html>
