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
	$about = $a['about'];
	$work = $a['work'];
	$study = $a['study'];
	$lives = $a['lives'];
	$placefrom = $a['placefrom'];
}
else{
	header("Location: index.php");
}
$sent = "";
if(isset($_POST['update_details'])){
  $status1 = $_POST['status'];
  $work1 = $_POST['work'];
  $study1 = $_POST['study'];
  $lives1 = $_POST['lives'];
  $placefrom1 = $_POST['placefrom'];
  $q1 = "UPDATE users SET about = '$status1',work = '$work1', study = '$study1', lives = '$lives1', placefrom = '$placefrom1' WHERE username = '$username'";
  mysqli_query($conn,$q1);
  $sent = 1;
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
  <li1><a style=" padding-bottom: 20px;" href="update_details.php" class="active"><div style="padding-top: 15px;">Update Your Personal Details</div></a></li1>
  <li1><a style=" padding-bottom: 20px;" href="update_password.php"><div style="padding-top: 15px;">Update Your Password</div></a></li1>
</ul1>
</div>
</div>

<div class = "col-lg-1"></div>
<div class = "col-lg-6" style="padding-top: 30px;">
  <div style="max-width: 300px;">
      <form method="post">
      <div class="form-group">
          <label>Your Status:</label>
            <input type="text" class="form-control" name = "status" value="<?php  echo $about; ?>" required autofocus>
        </div>
        <div class="form-group">
          <label>You Work at:</label>
            <input type="text" class="form-control" name = "work" value="<?php  echo $work; ?>" required autofocus>
        </div>
        <div class="form-group">
        <label>You Studied at:</label>
            <input type="text" class="form-control" name = "study" value="<?php  echo $study; ?>" required>
        </div>
        <div class="form-group">
        <label>You Live in:</label>
            <input type="text" class="form-control" name = "lives" value="<?php  echo $lives; ?>" required>
        </div>
        <div class="form-group">
        <label>Your hometown:</label>
            <input type="text" class="form-control"  name = "placefrom" value="<?php echo $placefrom; ?>" required>
        </div>
        <div class="form-group">
        <div style="padding-top: 20px;">
          <input type="submit" class="btn btn-default" name = "update_details" value= "Update">
        </div></div>
        <div style="padding-top: 20px; color: red; font-size: 30px;">
          <?php if($sent == 1) echo '<p>Your data has been successfully Updated</p>'; ?>
        </div>
          
</form>
  </div>

</div>














<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<!-- bootstrap.js -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>


</body>
</html>