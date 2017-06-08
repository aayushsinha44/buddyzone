<?php 
include('config/conn.php');
session_start();
if(isset($_SESSION['user_login'])){
	$username = $_SESSION['user_login'];
	$query = "SELECT user_id,first_name,last_name,about,work,study,lives,placefrom FROM users WHERE username = '$username'";
	$result = mysqli_query($conn,$query);
	$a= mysqli_fetch_assoc($result);
	$firstname = $a['first_name'];
	$lastname = $a['last_name'];	

}
else{
	header("Location: index.php");
}
$sent = "";
$fake = "";
$doesNotMatch = "";
if(isset($_POST['update_details'])){
  $oldpswd = $_POST['oldpswd'];
  $oldpswd = md5($oldpswd);
  $newpswd = $_POST['newpswd'];
  $newpswd = md5($newpswd);
  $newpswd1 = $_POST['newpswd1'];
  $newpswd1 = md5($newpswd1);
  
  $q1 = "SELECT password FROM users WHERE username = '$username'";
  $r1 = mysqli_query($conn,$q1);
  $c1 = mysqli_fetch_assoc($r1);
  if($c1['password'] == $oldpswd){
    if($newpswd == $newpswd1){
      $q = "UPDATE users SET password = '$newpswd' WHERE username = '$username'";  
      mysqli_query($conn,$q);
      $sent = 1;
    }
    else{
      $doesNotMatch = 1;
    }
  }
  else{
    $fake = 1;
  }
}
?>
<!DOCTYPE html>
<head>
	<title>Settings</title>
		<?php include('config/css.php'); ?>
	<link rel = "stylesheet" href="css/profile.css">
	<?php include('config/js.php'); ?>
</head>
<body>
<div class = "navbar1">
<div class = "container">
	<ul class="topnav">
		<li><a class="navbar-brand" href="home.php"><div style="font-weight: 800; text-shadow: 4px 4px 4px #4da6ff; color: white; font-size: 36px;">buddyZone</div></a></li>
		<li><a href="home.php">Home</a></li>
		<li><a  href="profile.php?uid=<?php echo $a['user_id'];?>">Profile</a></li>
		<li class="dropdown" style="float: right;">
    		<a href="javascript:void(0)" class="dropbtn"><?php echo $firstname; ?> <span class="caret"></span></a>
    		<div class="dropdown-content">
      			<a href="update_photo.php">Update Your Photo</a>
      			<a href="update_details.php">Update Your Personal Details</a>
      			<a href="update_password.php">Update Your Password</a>
      			<a href="logout.php">Logout</a>
    		</div>
  		</li>
	</ul>
</div>
</div>

<div style="padding-top: 30px; padding-left: 20px;" class="col-lg-3">
<ul1>
<div style="background-color: #1a8cff;">
  <li1><a style=" padding-bottom: 20px;"  href="update_photo.php"><div style="padding-top: 15px;">Update Your Photo</div></a></li1>
  <li1><a style=" padding-bottom: 20px;" href="update_details.php" ><div style="padding-top: 15px;">Update Your Personal Details</div></a></li1>
  <li1><a style=" padding-bottom: 20px;" href="update_password.php" class="active"><div style="padding-top: 15px;">Update Your Password</div></a></li1>
</ul1>
</div>
</div>

<div class = "col-lg-1"></div>
<div class = "col-lg-6" style="padding-top: 30px;">
  <div style="max-width: 300px;">
      <form method="post">
        <div class="form-group">
          <label>Your Old Password:</label>
            <input type="Password" class="form-control" name = "oldpswd"  required autofocus>
        </div>
        <div class="form-group">
        <label>Your New Password:</label>
            <input type="Password" class="form-control" name = "newpswd"  required>
        </div>
        <div class="form-group">
        <label>Your New Password(Again):</label>
            <input type="Password" class="form-control" name = "newpswd1"  required>
        </div>
        <div class="form-group">
        <div style="padding-top: 20px;">
          <input type="submit" class="btn btn-default" name = "update_details" value= "Update">
        </div></div>
        <div style="padding-top: 20px; color: red; font-size: 30px;">
          <?php if($sent == 1) echo '<p>Your data has been successfully Updated</p>'; ?>
          <?php if($fake == 1) echo '<p>Your old password doesnot match from the database password</p>'; ?>
          <?php if($doesNotMatch == 1) echo '<p>Your new passwords deosnot match</p>'; ?>
        </div>
          
</form>
  </div>

</div>














<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<!-- bootstrap.js -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>


</body>
</html>