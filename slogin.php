<?php
session_start();
include('connect.php');

if(!empty($_SESSION['uid']))
{
	header('location:home');
}

/* user registration start */
if(isset($_POST['register']))
{

    $password = mysqli_real_escape_string($con,$_POST['password']);
	$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

	if($password==$cpassword)
	{
     $rdate = date('Y-m-d');
	$fname = mysqli_real_escape_string($con,$_POST['fname']);
	$lastcp = mysqli_real_escape_string($con,$_POST['lastcp']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$gender = mysqli_real_escape_string($con,$_POST['gender']);
	$contact = mysqli_real_escape_string($con,$_POST['contact']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

	mysqli_query($con,"INSERT INTO `tbl_users`(`rdate`,`fname`,`lastcp`,`email`,`gender`,`contact`,`password`)VALUES('".$rdate."','".$fname."','".$lastcp."','".$email."','".$gender."','".$contact."','".$password."')");
	echo "<script>
	      alert('Successfully registered new student.');
	      window.location.href='slogin';
	</script>";
	}
else
{
	echo "<script>
	      alert('Password did not matched.');
	      window.location.href='slogin';
	</script>";
}
	
}
/* user registration end */

/* login start */
if(isset($_POST['login']))
{
	$user = mysqli_real_escape_string($con,$_POST['user']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);

	$sql = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `contact`='".$user."' && `password`='".$pass."' ");
	$result = mysqli_num_rows($sql);
	while($row = mysqli_fetch_assoc($sql))
	{
       $_SESSION['uid']=$row['uid'];
       $_SESSION['fname']=$row['fname'];
	}
	if($result>0)
	{
		header('location:home');
	}else{
		echo "<script>
		alert('Invalid Username or password..');
		window.location.href='index';
		</script>";
	}
}
/* login end */

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<?php include('bootcdn.php'); ?>
	<style type="text/css">
		body {background-image:url('images/home5.jpg');
	         background-size:cover;
	         background-attachment:fixed;}

	    .well {background-color:rgba(0,0,0,0.7);
	          color:lightsteelblue;
	          border:none;
	          /*box-shadow:0 0 2px lightsteelblue;*/}
        .input-group-addon {background:none;
                            border:none;
                            color:lightsteelblue;}

        .form-control {background:none;
                       border:none;
                       background-color:rgba(0,0,0,0.3);
                       border-radius:30px;}

        .form-control[placeholder] {color:lightsteelblue;}
        .btn-block {background:none;
                   border:none;
                   font-weight:bold;
                   background-color:rgba(0,0,0,0.6);}

        .modal-content {background-color:rgba(0,0,0,0.7);
                        color:lightsteelblue;}

        .modal-content .form-control {background-color:rgba(0,0,0,0.7);}
        .modal-content .btn-block {background-color:rgba(0,0,0,0.7);}
	</style>
  <script type = "text/javascript" >
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };
</script>
</head>
<body>

 <div class="container-fluid">
<br><br><br><br><br><br><br><br>
 	<div class="row">
 		<div class="col-sm-4"></div>
 		<div class="col-sm-4">
 			<!-- login form start -->
 			<div class="well">
 				<form method="post">
 					<h4>Student Login Here..</h4>
 					<hr>

    <!-- <input name="somename"
    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(5, this.maxLength);"
    type = "number"
    maxlength = "6"
 /> -->

 					<div class="input-group">
					   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					   <input type="text" class="form-control" name="user" placeholder="Contact No" autofocus="">
					</div>
					<br>
					<div class="input-group">
					   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					   <input type="password" class="form-control" name="pass" placeholder="Password">
					</div>
					<br>
					<button type="submit" name="login" class="btn btn-default btn-block">Login</button>
 				</form>
                <br>
 				<p>
 					Not register click on <i><a href="register" data-toggle="modal" data-target="#myModal">Sign Up</a></i>
 				</p>
 				<p>
 					Go to <i><a href="mentor/">Mentor Login</a></i>
 				</p>
 			</div>
 			<!-- login form end -->
 		</div>
 	</div>


 	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register Here..</h4>
      </div>
      <div class="modal-body">
        <form method="post">
        	<label>Student Full Name</label>
        	<input type="text" name="fname" class="form-control" placeholder="Candidate Name" required="">
        	<br>

        	<!-- <label>Branch</label>
        	<select style="background-color:white;" name="branch" class="form-control">
        		<option>Select Branch</option>
        		<option>CSE</option>
        		<option>AI/ML</option>
        		<option>Electrical</option>
        		<option>Mechanical</option>
            <option>ETC</option>
        	</select>
        	<br> -->
          <label>Last Year Class and Percentage</label>
          <input type="text" name="lastcp" placeholder="Last Year Class and Percentage" class="form-control" required>

        	<label>Email Id</label>
        	<input type="email" name="email" class="form-control" placeholder="Email Id" required="">
        	<br>

        	<label>Gender</label><br>
        	<input type="radio" name="gender" value="Male"> Male
        	<input type="radio" name="gender" value="Female"> Female
        	<br><br>

        	<label>Contact Number</label>
        	<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" minlength="10" name="contact" class="form-control" placeholder="Contact Number" required="">
        	<br>

        	<label>Password</label>
        	<input type="text" name="password" class="form-control" placeholder="Password" required="">
        	<br>

        	<label>Confirm Password</label>
        	<input type="text" name="cpassword" class="form-control" placeholder="Confirm Password" required="">
        	<br>

        	<button type="submit" class="btn btn-default btn-block" name="register">Register</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
 	
 </div>

</body>
</html>