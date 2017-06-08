<?php include('config/conn.php'); ?>
<?php
$passwordDoesnotMatch = "";
	$userexited = 0;
	$registered = 0;
if(isset($_POST['reg'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$pswd = $_POST['pswd'];
	$pswd1 = $_POST['pswd1'];
	
	if($pswd == $pswd1){
		$query007 = "SELECT username FROM users WHERE username = '$uname'";
		$result007 = mysqli_query($conn,$query007);
		$check007 = mysqli_num_rows($result007);
		if($check007 == 0){
			$pswd_md5 = md5($pswd);
			$q="INSERT INTO users (first_name,last_name,username,email,mobile,password) VALUES ('$fname','$lname','$uname','$email','$mobile','$pswd_md5')";
			$r = mysqli_query($conn,$q);
			$registered = 1;
		}
		else
			$userexited = 1;
	}
	else
		$passwordDoesnotMatch = 1;
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
		<?php include('config/css.php'); ?>
	<link rel = "stylesheet" href="css/profile.css">
	<?php include('config/js.php'); ?>
</head>
<body>
<div class="jumbotron" style="background-color: #1a8cff; text-align: center;">
  <h1 class="display-3"><a href="index.php"><div style="font-weight: 800; text-shadow: 4px 4px 4px #4da6ff; color: white; font-size: 72px; color: white;">buddyZone</div></a></h1>
  <hr class="my-4">
  <p>Please Enter your Details to proceed further</p>
</div>




<div class = "container" >
<div class = "row"><?php if($registered == 1) { echo"<script> alert('You have been registered Successfully. Login to Start..'); </script>";  }?></div>
	<div class = "row">
		<div class = "col-lg-4"></div>
		<div class = "col-lg-4">
				<form class="form-signin" method="post" style="max-width: 300px;">
			        	<input type="text" class="form-control" name = "fname" placeholder="First Name" required autofocus>
			        	<input type="text" class="form-control" name = "lname" placeholder="Last Name" required autofocus>
			        	<input type="text" class="form-control" name = "uname" placeholder="User Name" required autofocus>
			        	<?php if($userexited == 1) echo "<script> alert('User Name Already in Use'); </script>"; ?>
			        	<input type="text" class="form-control" name = "email" placeholder="Email Address" required autofocus>
			        	<input type="text" class="form-control" name = "mobile" placeholder="Mobile Number" required autofocus>
			            <input type="password" class="form-control" name ="pswd" placeholder="Password" required autofocus>
			            <input type="password" class="form-control" name = "pswd1" placeholder="Retype Password" required autofocus>	
			            <?php if($passwordDoesnotMatch == 1) echo "<script> alert('Password Doesnot Match'); </script>"; ?>
			            <div style="padding-top: 10px;">		        
			        	<center><input  type="submit" class="btn btn btn-primary btn-block" name = "reg" style="max-width: 100px;"></div></center>
			    </form>
			    
		</div>
	</div>
</div>
</body>
</html>