<?php 
include('config/conn.php');
session_start();
if(isset($_SESSION['user_login'])){
	$username = $_SESSION['user_login'];
	$query = "SELECT user_id,first_name,last_name,about,work,study,lives,placefrom,profile_pic,cover_pic FROM users WHERE username = '$username'";
	$result = mysqli_query($conn,$query);
	$a= mysqli_fetch_assoc($result);
	$firstname = $a['first_name'];
  

}
else{
	header("Location: index.php");
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
  <li1><a style=" padding-bottom: 20px;" class="active" href="update_photo.php"><div style="padding-top: 15px;">Update Your Photo</div></a></li1>
  <li1><a style=" padding-bottom: 20px;" href="update_details.php" ><div style="padding-top: 15px;">Update Your Personal Details</div></a></li1>
  <li1><a style=" padding-bottom: 20px;" href="update_password.php"><div style="padding-top: 15px;">Update Your Password</div></a></li1>
</ul1>
</div>
</div>

<div class = "col-lg-1"></div>
<div class = "col-lg-6" style="padding-top: 30px;">
  <div style="max-width: 300px;">
     <form method="post" enctype="multipart/form-data">
          <div style=" font-weight: 800; font-size: 22px;"> Select Proflie Picture to upload:</div>
          <div style="padding-top: 10px;">
          <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" class = "form-control" onchange="preview_image(event)">
          </div>
          <img id="output_image" style="max-width: 300px; padding-top: 10px;" />
          <div style="padding-top: 10px;">
          <input type="submit" value="Upload Profile Picture" name="submit" class="btn btn-default">
          </div>
    </form>
    <form method="post" enctype="multipart/form-data">
          <div style="padding-top: 20px; font-weight: 800; font-size: 22px;"> Select Cover Picture to upload:</div>
          <div style="padding-top: 10px;">
          <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" class = "form-control" onchange="preview_image1(event)">
          </div>
          <img id="output_image1" style="max-width: 300px; padding-top: 10px;" />
          <div style="padding-top: 10px;">
          <input type="submit" value="Upload Cover Picture" name="submit_cover" class="btn btn-default">
          </div>
    </form>

  </div>

</div>





<?php
if(isset($_POST['submit'])){
$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
$rand_dir_name = substr(str_shuffle($chars), 0, 15);
$target_dir = "uploads/profile_pics/$rand_dir_name";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$q = "UPDATE users SET profile_pic = '$target_file' WHERE username = '$username'";
mysqli_query($conn,$q);

}

if(isset($_POST['submit_cover'])){
$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
$rand_dir_name = substr(str_shuffle($chars), 0, 15);
$target_dir = "uploads/cover_pics/$rand_dir_name";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit_cover"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$q = "UPDATE users SET cover_pic = '$target_file' WHERE username = '$username'";
mysqli_query($conn,$q);

}

?>









<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<!-- bootstrap.js -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>


<!-- Preview Image before uploading  -->
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
function preview_image1(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image1');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>