<?php
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
$notice=$_POST['notice'];
$title=$_POST['title'];
$date=date('d-M-Y');
$access=$_POST['access'];
if($notice==NULL || $title==NULL || $access==NULL)
{
	//ASLDo Nothing
}
else
{
	$extension = end(explode(".", $_FILES["file"]["name"]));
	// $filename="$title".".$extension";
	// move_uploaded_file($_FILES["file"]["tmp_name"],"asl_uploads/$filename"); 
	mysqli_query($techVegan,"INSERT INTO notices(title,notice,date,access) VALUES('$title','$notice','$date','$access')");
	$info="Successfully Submitted Notice";

}
$del=$_GET['del'];
if($del==NULL)
{
	//ASL Do Nothing
}
else
{
	mysqli_query($techVegan,"DELETE FROM notices WHERE id='$del'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notice Control Panel</title>
<link rel="stylesheet" href="assets/css/box.css"  type="text/css" />
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

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
    <link rel="stylesheet" href="assets/css/box.css"  type="text/css" />
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
        <hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
        <div align="center">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" onsubmit="MM_validateForm('title','','R','notice','','R');return document.MM_returnValue">
        <table cellpadding="3" cellspacing="3" class="formTable">
        <tr><td colspan="2">
        <span class="Subhead">Add Notice</span>
        <hr />
        </td></tr>
        <tr><td colspan="2" class="info"><?php echo $info;?></td></tr>
        <tr><td class="labels">Access Type</td><td><select name="access" class="fields"><option disabled="disabled" selected="selected">- Select Access Type - </option><option value="0">Student</option><option value="1">Faculty</option></select></td></tr>
        <tr><td class="labels">Title</td><td><input name="title" type="text" class="fields" id="title" placeholder="Enter Title" size="45" /></td></tr>
        <tr><td class="labels">Notice</td><td><textarea name="notice" cols="35" class="fields" id="notice" style="height:70px;font-family:'trebuchet MS';" placeholder="Enter Notice"></textarea></td></tr>
        <!-- <tr><td class="labels">Upload File</td><td><input type="file" name="file" size="45" class="button" placeholder="Select Document or Image File"/></td></tr> -->
        <tr><td colspan="2" align="center"><input type="submit" value="Submit" class="border-first-button button" onclick="return confirm('Are You Sure...?');"/></td></tr>

        </table> 
        </form>
        <br>
        <table cellpadding="3" cellspacing="3" class="formTable">
        <tr><th>ID</th><th>Title</th><th>Notice</th><th>Access Type</th>
        <!-- <th>Download</th> -->
        <th>Action</th></tr>
        <?php 
        $a=mysqli_query($techVegan,"SELECT * FROM notices ORDER BY id DESC");
while($b=mysqli_fetch_array($a))
{
	?>
<tr class="info"><td><?php echo $b['id'];?></td><td><?php echo $b['title'];?></td><td><?php echo $b['notice'];?></td>
<td>
<?php 
if($b['access']==0){echo "Student";}else{echo "Faculty";}
?>
</td>
<!-- <td align="center"><a href="asl_uploads/<?php echo $b['file'];?>"><img src="images/dwd.png" height="30" width="30" /></a></td> -->
<td>
<a href="edit.php?edit=<?php echo $b['id'];?>" style="text-shadow:0px 0px 1px #000000;">Edit</a>
<a href="notices.php?del=<?php echo $b['id'];?>" onclick="return confirm('Are You Sure..?');" style="text-shadow:0px 0px 1px #000000;">Delete</a>
</td></tr>
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

