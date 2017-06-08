<?php include('config/conn.php'); ?>
<?php


include_once('app/config.php');

// Check if the page request type
if (isset($_POST['uname']) && isset($_POST['pswd'])) {
    
  $email = $_POST['uname'];
  $password = $_POST['pswd'];
  $password = md5($password);

  // Clean user input values
  $c_email = $mysqli->real_escape_string($email);
  $c_password = $mysqli->real_escape_string($password);
  
  $resultObj = $mysqli->query('SELECT * FROM `users` '
          . ' WHERE `username` = "' . $c_email . '"'
          . ' AND `password` = "' . $c_password . '"');
  
  if ($mysqli->affected_rows > 0) {
    $user_details = $resultObj->fetch_assoc();
    setcookie('uid', $user_details['user_id'], time() + (86400 * 30), '/');
    
    // Logged in, redirect to home.
    header('Location: home.php');
  } else {
    // Not logged in, redirect to login with error.
    //header('Location: index.php?err=invalid');
  }
}











$fakeuser = "";
if(isset($_POST['signin'])){
	$uname = $_POST['uname'];
	$pswd = $_POST['pswd'];
	$pswd = md5($pswd);
	$query = "SELECT username,password FROM users WHERE username = '$uname' AND password = '$pswd'";
	$result = mysqli_query($conn,$query);
	$check = mysqli_num_rows($result);
	if($check > 0){
		session_start();
		$_SESSION['user_login'] = $uname;
		//if($_SESSION['user_login']!=null)
			//header("Location: home.php");
		}
	else
		$fakeuser = 1;
}












?>
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
		$result007= mysqli_query($conn,$query007);
		$check007 = mysqli_num_rows($result);
		if($check == 0){
			$pswd = md5($pswd);
			$q="INSERT INTO users (first_name,last_name,username,email,mobile,password,dater) VALUES ('$fname','$lname','$uname','$email','$mobile','$pswd','$d')";
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
<head>
	<title>Index</title>
	<?php include('config/css.php'); ?>
	<link rel="stylesheet" href="css/index.css">
	<?php include 'config/js.php'; ?>
</head>
<body>

<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand" style="font-weight: 800; text-shadow: 2px 2px 4px #4da6ff; color: #4da6ff; font-size: 36px; padding-bottom: 10px;">buddyZone</h3>
              <nav class="nav nav-masthead">
              	<div style="padding-top: 25px; padding-right: 5px;">
                <a class="nav-link active" href="index.php" style="color: #4da6ff; font-size: 20px;">Home</a>
                <a class="nav-link" href="about.php" style="color: #4da6ff; font-size: 20px;">About</a>
                <a class="nav-link" href="contact.php" style="color: #4da6ff; font-size: 20px;">Contact</a></div>
              </nav>
            </div>
          </div>
        </div>

        

      </div>


</div>


<div class = "container" style="padding-top: 40px;">
			<div class = "row">
				<div class = "col-lg-8"></div>
				<div class = "col-lg-4">
					<div class = "signin">
						<form class="form-signin" method="POST">
			        	<h2 class="form-signin-heading">Please sign in</h2>
			        		<input type="text" id="inputEmail" class="form-control" name = "uname" placeholder="User Name" required autofocus>
			            	<input type="password" id="inputPassword" name = "pswd" class="form-control" placeholder="Password" required>
			        		<div id="myBtn1" style="font: #ff0000; padding-bottom: 5px"><a  href="signup.php"><font color= red>New User Register Here...</font></a></div>
			        		<input type="submit" class="btn btn-lg btn-primary btn-block" name = "signin" value="Sign In" style= "max-width: 100px;">
			    		</form>
			    		<?php if($fakeuser == 1) echo "<div class = 'alert'><font color = red>Invalid Entry. Please try agian </font></div>"; ?>
					</div>
				</div>
			</div>
		</div>



<div class="mastfoot">
            <div class="inner">
              <p><center>Developed by Aayush Sinha</center></p>
            </div>
</div>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
      <span class="close">&times;</span>
      <h2><center>Register Here</center></h2>
    </div>
    <div class="modal-body">
      <div class = "container" style="text-align: center;">
	<div class = "row">
		<div class="col-lg-2"></div>
		<div class = "col-lg-4">
				<form class="form-signin" method="post">
			        <center> 
			        	<input type="text" class="form-control" name = "fname" placeholder="First Name" required autofocus>
			        	<input type="text" class="form-control" name = "lname" placeholder="Last Name" required autofocus>
			        	<input type="text" class="form-control" name = "uname" placeholder="User Name" required autofocus>
			        	<?php if($userexited == 1) echo "<font color = red>User Name Already in Use</font>"; ?>
			        	<input type="text" class="form-control" name = "email" placeholder="Email Address" required autofocus>
			        	<input type="text" class="form-control" name = "mobile" placeholder="Mobile Number" required autofocus>
			            <input type="password" class="form-control" name ="pswd" placeholder="Password" required autofocus>
			            <input type="password" class="form-control" name = "pswd1" placeholder="Retype Password" required autofocus>	
			            <?php if($passwordDoesnotMatch == 1) echo "<font color = red>Password Doesnot Match</font>"; ?>
			            <div style="padding-top: 10px;">		        
			        	<input  type="submit" class="btn btn-lg btn-primary btn-block" name = "reg"></div>
			    </form>
			    <?php if($registered == 1) echo "<center><h1><font color = red>You have been registered Successfully. Login to Start..</font></h1></center>";?>
			    	</center>
		</div>
	</div>
</div>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>
</body>
</html>