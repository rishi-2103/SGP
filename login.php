<?php
session_start();
if(isset($_SESSION['sid']))
{
	header("location:shome.php");
}elseif(isset($_SESSION['fid']))
	{
		header("location:fhome.php");
	}elseif(isset($_SESSION['admin']))
		{
			header("location:../admin.php");
		}

include("../config.php");
$id=$_POST['id'];
$pass=$_POST['pass'];
$type=$_POST['type'];

if($type==1)
{
	$sql=mysqli_query($techVegan,"SELECT * FROM registration WHERE (roll='".mysqli_real_escape_string($techVegan,$id)."' AND password='".mysqli_real_escape_string($techVegan,sha1($pass))."') AND status='0'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['sid']=$_POST['id'];
		header("location:../shome.php");
	}
	else
	{
		$info="Incorrect User ID or Password";
	}
}
// elseif($type==2)
// {
// 	$sql=mysqli_query($techVegan,"SELECT * FROM faculty WHERE (fid='".mysqli_real_escape_string($techVegan,$id)."' AND password='".mysqli_real_escape_string($techVegan,sha1($pass))."') AND status='1'");
// 	if(mysqli_num_rows($sql)==1)
// 	{
// 		$_SESSION['fid']=$_POST['id'];
// 		header("location:fhome.php");
// 	}
// 	else
// 	{
// 		$info="Incorrect User ID or Password";
// 	}
// }
elseif($type==3)
	{
	$sql=mysqli_query($techVegan,"SELECT * FROM admin WHERE id='".mysqli_real_escape_string($techVegan,$id)."' AND password='".mysqli_real_escape_string($techVegan,sha1($pass))."'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['admin']=$_POST['id'];
		header("location:../admin.php");
	}
	else
	{
		$info="Incorrect User ID or Password";
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
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
<body>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="" method="post" onsubmit="MM_validateForm('id','','R','pass','','R');return document.MM_returnValue">
        <h1>Sign In</h1>
            <input autocomplete = "off" name="id" type="text" id="id" placeholder="Username" />
    		<input name="pass" type="password" id="pass" placeholder="Password" />
            <p>User: &nbsp; &nbsp;<select name="type" class="fields"><option disabled="disabled" selected="selected">- Select User Type -</option><option value="1">Student</option><option value="3">Admin</option></select></p>
          <!-- <span>or</span>
          <a href="https://accounts.google.com/v3/signin/identifier?dsh=S1979873313%3A1664080931158160&continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dsign%2Bin%2Bgoogle%26rlz%3D1C1ONGR_enIN986IN986%26oq%3Dsign%2Bin%2Bgoogle%26aqs%3Dchrome..69i57j0i271j69i60l3.5380j0j1%26sourceid%3Dchrome%26ie%3DUTF-8&ec=GAZAAQ&hl=en&passive=true&flowName=GlifWebSignIn&flowEntry=ServiceLogin&ifkv=AQDHYWqGbFUjvDiB9B_qoinI-zSeKRjA8fYf23MF9a35PzI6SNERqA-pf8-PjJ9rhgjSGBPk17Tu">
          <button type="button" name="Google" class="btn btn-outline-dark"><i class="google fa-brands fa-google"></i></i>Continue with Google</button>
          </a> -->
    			<a href="#">Forgot your password?</a>
    			<button>Sign In</button>
    		</form>
    </div>
    <div class="overlay-container">
    		<div class="overlay">
    			<div class="overlay-panel overlay-left">
    				<h1>Welcome Back!</h1>
    				<p>To keep connected with us please login</p>
    				<button type="submit" class="ghost" id="signIn">Sign In</button>
    			</div>
    			<div class="overlay-panel overlay-right">
    				<h1>Hello, Friend!</h1>
    				<p>Enter your personal details and start journey with us</p>
                    <a href="../registration/registration.php"><button class="ghost" id="signUp">Sign Up</button></a>
    				
    			</div>
    		</div>
    	</div>
</div>
</body>
</html>
