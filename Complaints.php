<?php
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
if($_GET['del']==NULL)
{
	//ASL Do Nothing
}
else
{
	$del=$_GET['del'];
	mysqli_query($techVegan,"DELETE FROM complaints WHERE id='$del'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Complaints</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>


<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img class="logo-img" src="images/logo.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <!-- <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#notice">Notices</a></li>
              <li class="scroll-to-section"><a href="#documents">Documents</a></li>
              <li class="scroll-to-section"><a href="#live scores">Live Scores</a></li>
              <li class="scroll-to-section"><a href="#photo gallery">Photo Gallery</a></li>
              <li class="scroll-to-section"><a href="#contact">Contact</a></li>  -->
              <li><div class="border-first-button"><a href="logout.php">Log Out</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  <div class="main-banner wow fadeIn"  data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
    

<div align="center">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>Complaint</th><th>Complaint By</th><th>Date</th><th>Action</th></tr>
<?php

$sql=mysqli_query($techVegan,"SELECT * FROM complaints ORDER BY id DESC");
while($a=mysqli_fetch_array($sql))
{
	?>
<tr class="info"><td><?php echo $a['complaint'];?></td><td>
<?php 
if($a['access']==0)
{
	echo "Student";
}
else
{
	echo "Faculty";
}?>
</td><td><?php echo $a['date'];?></td><td><a href="Complaints.php?del=<?php echo $a['id'];?>" onclick="return confirm('Are You Sure..?');" style="text-shadow:0px 0px 1px #000000;">Delete</a></td></tr>
<?php } ?> 

</table>
<div class="border-first-button go-back"><a href="admin.php">Go Back</a></div>

</div>
      </div>
    </div>
  </div>

 

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>

