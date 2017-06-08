<?php 
include('config/conn.php');
session_start();
if(isset($_SESSION['user_signup'])){
	$username = $_SESSION['user_signup'];
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
<html>
<head>
	<title>Enter Details</title>
	<link type="text/css" rel="stylesheet" href="css/profile.css">
</head>
<body>


<div class = "col-lg-3" style="padding-top: 30px;"></div>
<div class = "col-lg-6" style="padding-top: 30px;">
  <div style="max-width: 300px;">
      <form method="post">
      <div class="form-group">
          <label>Your Status:</label>
            <input type="text" class="form-control" name = "status"  required autofocus>
        </div>
        <div class="form-group">
          <label>You Work at:</label>
            <input type="text" class="form-control" name = "work"  required autofocus>
        </div>
        <div class="form-group">
        <label>You Studied at:</label>
            <input type="text" class="form-control" name = "study"  required>
        </div>
        <div class="form-group">
        <label>You Live in:</label>
            <input type="text" class="form-control" name = "lives"  required>
        </div>
        <div class="form-group">
        <label>Your hometown:</label>
            <input type="text" class="form-control"  name = "placefrom"  required>
        </div>
        <div class="form-group">
        <div style="padding-top: 20px;">
          <input type="submit" class="btn btn-primary" name = "update_details" value= "Update">
          <div style="float: left;"><a href="enter_photo_profile.php"><button class="btn btn-default">Skip</button></a></div>
        </div></div>
        <div style="padding-top: 20px; color: red; font-size: 30px;">
          <?php if($sent == 1) echo '<p>Your data has been successfully Updated</p>'; ?>
        </div>
          
</form>
  </div>

</div>



</body>
</html>