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
<html>
<head>
	<title>Enter Photo</title>
	<link rel = "stylesheet" href="css/profile.css">
</head>
<body>

<div class = "col-lg-3" style="padding-top: 30px;"></div>
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
          <div style="float: left;"><a href="enter_photo.php"><button class="btn btn-default">Skip</button></a></div>
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
?>

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
</script>
</body>
</html>