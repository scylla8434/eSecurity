<?php
include('includes/dbconnection.php');
    if(isset($_POST['submit']))
  {
$name=$_POST['name'];
$mobnum=$_POST['mobilenumber'];
$address=$_POST['address'];
$idtype=$_POST['idtype'];
$idnum=$_POST['idnum'];
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}


$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$sql="insert into tblguard(Profilepic,Name,MobileNumber,Address,IDtype,IDnumber)values(:pics,:name,:mobilenumber,:address,:idtype,:idnum)";
$query=$dbh->prepare($sql);
$query->bindParam(':pics',$propic,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobilenumber',$mobnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':idtype',$idtype,PDO::PARAM_STR);
$query->bindParam(':idnum',$idnum,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your details have been recorded successully.")</script>';
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
      // Validate Name
      var name = document.getElementById("name").value;
      var nameRegex = /^[A-Za-z\s]+$/; // Allow letters and spaces
      if (!nameRegex.test(name)) {
        alert("Please enter a valid name with only letters and spaces.");
        return false;
      }

      // Validate ID Number
      var idnum = document.getElementById("idnum").value;
      var idNumRegex = /^\d{8}$/;
      if (!idNumRegex.test(idnum)) {
        alert("Please enter a valid 8-digit ID Number.");
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

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
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
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Register Below</h2>

        </div>
      		<div class="container">
      			<div class="row">
      				<div class="col-lg-7 m-auto text-black">
                <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
               
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1"><strong>Profile Pic</strong></label>
                          <input type="file" class="form-control" id="propic" name="propic" required="true">
                        </div>
                           <div class="form-group">
                          <label for="exampleInputEmail1"> <strong>Name</strong> </label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="true">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><strong>Mobile Number</strong></label>
                          <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+" required="true">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><strong>Address</strong></label>
                          <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" required="true"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><strong>ID Type</strong></label>
                           <select type="text" name="idtype" id="idtype" value="" class="form-control" required="true">
      <option value=""><strong>Choose ID Type</strong></option>

      <option value="National Card">National ID</option>
      <option value="Voter Card">Passport</option>



                                                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><strong>ID Number</strong></label>
                          <input type="text" class="form-control" id="idnum" name="idnum" placeholder="Enter ID Number" required="true">
                        </div>
                      </div>

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                      </div>
                    </form>

      				</div>
      			</div>
      		</div>

    </section><!-- End About Section -->

      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- bs-custom-file-input -->
      <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <script type="text/javascript">
      $(document).ready(function () {
        bsCustomFileInput.init();
      });
      </script>
      <script src="js/vendor/jquery-3.2.1.min.js"></script>
      	<script src="js/bootstrap.min.js"></script>
      	<script src="js/jquery.slicknav.min.js"></script>
      	<script src="js/owl.carousel.min.js"></script>
      	<script src="js/jquery.nice-select.min.js"></script>
      	<script src="js/jquery-ui.min.js"></script>
      	<script src="js/jquery.magnific-popup.min.js"></script>
      	<script src="js/main.js"></script>
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

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
