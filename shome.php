<?php
session_start();
include("config.php");
if(!isset($_SESSION['sid']))
{
	header("location:login/login.php");
}
$sid=$_SESSION['sid'];

$a=mysqli_query($techVegan,"SELECT name FROM registration WHERE roll='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];

// Notices
session_start();
include("config.php");
if(!isset($_SESSION['sid']))
{
	header("location:login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- links  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Sportify - Sports Website</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
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
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#notice">Notices</a></li>
              <li class="scroll-to-section"><a href="#documents">Documents</a></li>
              <li class="scroll-to-section"><a href="#live scores">Live Scores</a></li>
              <li class="scroll-to-section"><a href="#photo gallery">Photo Gallery</a></li>
              <li class="scroll-to-section"><a href="#contact">Contact</a></li> 
              <li><div class="border-first-button"><a href="logout.php">Log Out</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
          
       </div>
       <a class = "pass" href="changePass.php">Change Password</a>
     </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Sportify</h6>
                    <h2>The Single Stop Sports Guide</h2>
                    <p>Sportify is a free Live Website that help you simplify the sports events like Spoural. This website gives you the info of each event and the details and live scores.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="border-first-button scroll-to-section">
                      <a href="#contact">Free Quote</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/sport.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="notice" class="about section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <img class="notice" src="images/notice.png" alt="">
              </div>
            </div>
            <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="about-right-content">
                <div class="section-heading">
                  <!-- <h6>About Us</h6> -->
                  <h4>Notices</h4>
                  <div class="line-dec"></div>
                </div>
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>Title</th><th>Notices</th><th>Date</th></tr>
<?php
$sql=mysqli_query($techVegan,"SELECT * FROM notices WHERE access='0' ORDER BY id DESC");
while($a=mysqli_fetch_array($sql))
{
	?>
<tr class="info"><td><?php echo $a['title'];?></td><td><?php echo $a['notice'];?></td><td><?php echo $a['date'];?></td></tr>
<?php
}
?>
</table>
</div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="documents" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <!-- <h6>Live Scores</h6> -->
            <h4>Documents</h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="first-thumb active">
                    <a href="registration.html">
                      <div class="thumb">
                        <span class="icon"><img src="images/file.png" alt=""></span>
                        Registration
                      </div></a>
                </div>
                     <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="images/file.png" alt=""></span>
                        Coming Soon
                      </div>
                     </div>
                     <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="images/file.png" alt=""></span>
                        Coming Soon
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="images/file.png" alt=""></span>
                        Coming Soon
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">                 
                        <span class="icon"><img src="images/file.png" alt=""></span>
                        Coming Soon
                      </div>
                    </div>
                  </div>
                </div> 
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div id="live scores" class="free-quote">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
            <h3>Live Scores</h3>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-2  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
          <form id="search" action="#" method="GET">
            <div class="row">
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <input type="web" name="web" class="website" placeholder="Your website URL..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <input type="address" name="address" class="email" placeholder="Email Address..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <button type="submit" class="main-button">Get Quote Now</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div id="photo gallery" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>Photo Gallery</h6>
            <h4> A Glimpse of<em> Spoural</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
      </div>
     </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
      <div class="row">
        <a href="photo-gallery.html"><h5 class="view-text">View All</h5></a>
        <div class="col-lg-12">
          <div class="loop owl-carousel">
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img class="photo-img" src="photo gallery/5.jpg" alt="">
                </div>
                <div class="down-content">
                  <h4>Cricket</h4>
                  
                </div>
              </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img class="photo-img" src="photo gallery/1.jpg" alt="">
                </div>
                <div class="down-content">
                  <h4>Basketball</h4>
                 
                </div>
              </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img class="photo-img" src="photo gallery/21.jpg" alt="">
                </div>
                <div class="down-content">
                  <h4>Tug of War</h4>
                  
                </div>
              </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img class="photo-img" src="photo gallery/15.jpg" alt="">
                </div>
                <div class="down-content">
                  <h4>Chess</h4>
                  
                </div>
              </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img class="photo-img" src="photo gallery/28.jpg" alt="">
                </div>
                <div class="down-content">
                  <h4>Opening Event</h4>
                  
                </div>
              </div>
              </a>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  </div>   

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Contact Us</h6>
            <h4>Get In Touch With Us <em>Now</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-dec">
                  <img src="assets/images/contact-dec-v3.png" alt="">
                </div>
              </div>
             
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="fill-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/phone-icon.png" alt="">
                          <a href="#">123456890</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/email-icon.png" alt="">
                          <a href="#">our@email.com</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/location-icon.png" alt="">
                          <a href="#">Anand, Gujarat</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                      </fieldset>
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 Sportify. All Rights Reserved. 
          <br>Krish, Rishikesh, Aakash, Nilang</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>