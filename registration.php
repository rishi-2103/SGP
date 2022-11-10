<?php
require("../config.php");
$name=$_POST['name'];
// $day=$_POST['day'];
// $month=$_POST['month'];
// $year=$_POST['year'];
$roll=$_POST['roll'];
$email=$_POST['email'];
// $contact=$_POST['contact'];
$branch=$_POST['branch'];
$cyear=$_POST['cyear'];
$p1=$_POST['p1'];
$p2=$_POST['p2'];
// $date=date('d-M-Y');

$c=mysqli_query($techVegan,"SELECT * FROM registration WHERE roll='$roll'");
if($name==NULL || $roll==NULL || $email==NULL || $p1==NULL || $p2==NULL)
{
		//asl Do Nothing
}
elseif(mysqli_num_rows($c)==1)
		{
			$info="User Already Registered ";
		}
		elseif($p1==$p2)
		{	
			$p3=sha1($p1);
			$sql=mysqli_query($techVegan,"INSERT INTO registration(name,roll,email,branch,cyear,password,status) VALUES('$name','$roll','$email','$branch','$cyear','$p3','0')");
			$info="Successfully Registered User $name";
		}
		else
		{
			$info="Password Didn't Matched ";
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>login</title>
    <link rel="stylesheet" href="registration.css">
    <script src="https://kit.fontawesome.com/54185f07f4.js" crossorigin="anonymous"></script>
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
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

</script>
  </head>
  <body>
    <div class="container" id="container">
    	<div class="form-container sign-in-container">
        <form action="" method="post" onsubmit="MM_validateForm('name','','R','roll','','RisNum','email','','RisEmail','contact','','RisNum','p1','','R','p2','','R');return document.MM_returnValue">
        <h1>Create Account</h1>
<?php echo $info;?>
<input name="name" type="text" class="fields" id="name" placeholder="Enter Full Name" size="40"/>


<input name="roll" type="text" class="fields" id="roll" placeholder="Enter Roll No." size="15"/>
<input name="email" type="text" class="fields" id="email" placeholder="Enter E-Mail ID" size="40"/>


<select name="branch" class="fields" data-width="fit">
	   <option value="NA" selected="selected" disabled="disabled">-Select Branch-</option>
       <option value="Civil Engineering">Civil Engineering</option>
       <option value="Computer Science and Engineering">Computer Science and Engineering</option>
       <option value="Computer Engineering">Computer Engineering</option>
       <option value="Computer Technology">Computer Technology</option>
       <option value="Information Technology">Information Technology</option>
       <option value="Electronics Engineering">Electronics Engineering</option>
       <option value="Electrical Engineering">Electrical Engineering</option>
       <option value="Elect. and Telecom. Engineering">Elect. and Telecom. Engineering</option>
       <option value="Elect. and Comm. Engineering">Elect. and Comm. Engineering</option>
       <option value="Mechanical Engineering">Mechanical Engineering</option>
       <option value="Basic Sciences">Basic Sciences</option>
       </select><br>



<select name="cyear" class="fields">
<option value="NA" selected="selected" disabled="disabled">- Select Year -</option>
<option value="1">First Year</option>
<option value="2">Second Year</option>
<option value="3">Third Year</option>
<option value="4">Final Year</option>
</select>



<input name="p1" type="password" class="fields" id="p1" placeholder="Enter Password" size="30"/>
<input name="p2" type="password" class="fields" id="p2" placeholder="Re-Type Password" size="30"/>
<button onclick="return confirm('Please Confirm All Fields Before Submitting');">Register</button><br>
<button onclick="return confirm('Are You Sure...?');">Clear</button>

          
    		</form></br>
    	</div>
    	
    	<div class="overlay-container">
    		<div class="overlay">
    			<div class="overlay-panel overlay-right">
    				<h1>Welcome Back!</h1>
    				<p>To keep connected with us please login</p>
    				<a href="../login/login.php"><button class="ghost" id="signIn">Sign In</button></a>
    			</div>
    			
    		</div>
    	</div>
    </div>
  <!-- <script src="first.js" charset="utf-8"></script> -->
  </body>
</html>
