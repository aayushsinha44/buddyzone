<?php
include 'config/conn.php';
session_start();
if(isset($_SESSION['user_login'])){

}
else{
	header('Location: index.php');
}
$u = $_SESSION['user_login'];
$re = mysqli_query($conn,"SELECT user_id,first_name FROM users WHERE username = '$u'");
$arr = mysqli_fetch_assoc($re);

$firstname1 = $arr['first_name'];
$userid = $_GET['uid'];
$re01 = mysqli_query($conn,"SELECT username FROM users WHERE user_id = '$userid'");
$row01 = mysqli_fetch_assoc($re01);
$useritselt = "";
if($row01['username'] == $_SESSION['user_login']){
	//User is itself seesing his profile
	$useritselt = 1;
}
else{
	//Somebody Else seesing his profile
	$useritselt = 0;
}
$query = "SELECT user_id,first_name,last_name,about,work,study,lives,placefrom,profile_pic,cover_pic FROM users WHERE user_id = '$userid'";
$result = mysqli_query($conn,$query);
$a= mysqli_fetch_assoc($result);
$userid = $arr['user_id'];
$firstname = $a['first_name'];
$lastname = $a['last_name'];	
$about = $a['about'];
$work = $a['work'];
$study = $a['study'];
$lives = $a['lives'];
$placefrom = $a['placefrom'];
$profile = $a['profile_pic'];
$cover = $a['cover_pic'];
?>
<?php
$qu001 = "SELECT user_one_id,user_two_id,status FROM relationship";
$re001 = mysqli_query($conn,$qu001);

$friend_count = 0;
while($row001 = mysqli_fetch_assoc($re001)){
	if(($row001['user_one_id'] == $_GET['uid'] || $row001['user_two_id'] == $_GET['uid']) && $row001['status']==1) {
		$friend_count = $friend_count + 1;
	} 
}

?>
<?php
$page = "profile.php?uid=".$userid."";
$sec = "900";
?>

<!DOCTYPE html>
<head>
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<title>Profile</title>
		<?php include('config/css.php'); ?>
	<link rel = "stylesheet" href="css/profile.css">
	<?php include('config/js.php'); ?>
</head>
<body>

<div class = "navbar1">
<div class = "container">
	<ul class="topnav">
		<li><a class="navbar-brand" href="home.php"><div style="font-weight: 800; text-shadow: 4px 4px 4px #4da6ff; color: white; font-size: 36px;">buddyZone</div></a></li>
		<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
		<li><a <?php if($useritselt ==1) echo "class='active'";?> href="profile.php?uid=<?php echo $userid;?>"><?php echo $arr['first_name']; ?>'s Profile</a></li>
		<li class="dropdown" style="float: right; ">
    		<a href="javascript:void(0)" class="dropbtn"><?php echo $firstname1; ?> <span class="caret"></span></a>
    		<div class="dropdown-content">
      			<a href="update_photo.php">Update Your Photo</a>
      			<a href="update_details.php">Update Your Personal Details</a>
      			<a href="update_password.php">Update Your Password</a>
      			<a href="logout.php">Logout</a>
    		</div>
  		</li>
		<div style="display: <?php if($useritselt == 0) echo 'none'; ?>"><li id="myBtn" class="right"><a href="#">Notification</a></li></div>
	</ul>
</div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
      <span class="close">&times;</span>
      <h2><center>Notification</center></h2>
    </div>
    <div class="modal-body">
      <p style="padding-top: 20px;padding-bottom: 20px; "></p>
      <?php
			$request_sent_by = "";
			if($useritselt == 1){
				$qu001 = "SELECT user_one_id,user_two_id,status FROM relationship";
				$re001 = mysqli_query($conn,$qu001);

			while($row001 = mysqli_fetch_assoc($re001)){
				if(($row001['user_two_id'] == $arr['user_id'] || $row001['user_one_id'] == $arr['user_id']) && $row001['status'] == 0 ){
					if($row001['user_two_id'] == $arr['user_id'] )$request = $row001['user_one_id'];
					if($row001['user_one_id'] == $arr['user_id'] ) $request = $row001['user_two_id'];
					$q02 = "SELECT user_id,first_name,last_name FROM users WHERE user_id = '$request'";
					$r02 = mysqli_query($conn,$q02);
					$row02 = mysqli_fetch_assoc($r02);
					$request_sent_by = $row02['first_name'].' '.$row02['last_name'];
					?><div><p> You have recieved a friend request from <a href="profile.php?uid=<?php echo $row02['user_id'];  ?>"><?php echo $request_sent_by;  ?></a></p></div><hr />   <?php
				}
				if($row001['user_one_id'] == $arr['user_id']  && $row001['status'] == 1 ){
					$request = $row001['user_two_id'];
					$q02 = "SELECT user_id,first_name,last_name FROM users WHERE user_id = '$request'";
					$r02 = mysqli_query($conn,$q02);
					$row02 = mysqli_fetch_assoc($r02);
					$request_sent_by = $row02['first_name'].' '.$row02['last_name'];
					?><div><p> <a href="profile.php?uid=<?php echo $row02['user_id'];  ?>"><?php echo $request_sent_by;  ?></a> has accepted your friend request.</p></div><hr />   <?php
				}
	}
}

?>
    
    </div>
  </div>

</div>



<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
      <span class="close1">&times;</span>
      <h2><center>Photos</center></h2>
    </div>
    <div class="modal-body">
      <?php
		$query1 = "SELECT picture FROM posts WHERE post_from_id='$userid' and picture!='NULL' ORDER by post_id DESC";
		$result1 = mysqli_query($conn,$query1);
		while ($row3 = mysqli_fetch_assoc($result1)) {
			if($row3['picture']!=NULL)
			?>
		<div style="padding-left: auto; padding-bottom: 10px;"><a href="./<?php echo $row3['picture'] ?>"><img src="<?php echo $row3['picture'] ?>" width="100%" height="auto" style="position: auto;"></a><hr/></div>
		<?php
		}
	?>
    </div>
  </div>

</div>





<div class = "container">
	<div class = "row">
		<div class = "col-lg-3" style="max-width: 300px;">
			<div class = "row12">			
				<div style="padding-top: 140px; position: absolute;">
					<div class = "col-lg-5"></div>
					<div class = "col-lg-2"><img src = "<?php echo $profile;  ?>" class = "img-circle center-block" width="100px" height = "100px" /></div>
				</div>
				<div style="padding-top: 20px;">					
					<img src = "<?php echo $cover;  ?>" width="100%" height="170px" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);" />
				</div>
			</div>
			<div class = "row12" style="background-color: white; padding-top: 75px; height: auto; padding-bottom: 20px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
				<div style="font-weight: 800;"><?php echo "<center><p>".$firstname.' '.$lastname."</p></center>"; ?></div>
				<?php echo "<center><p>".$about."</p></center>"; ?>		
				<div style="padding-top: 20px; font-weight: 800"><center>Friends</center></div>
				<div style="padding-top: 20px"><center><?php echo $friend_count; ?></center></div>


					<center>
					<?php

					include_once('app/config.php');

					$user = new User();

					if (isset($_COOKIE['uid']) ) {
					 
					  
					  //################ Logged in user details ###################################
					  
					  // Logged in user details.
					  $user = $user->getUser($mysqli, (int) $_COOKIE['uid']);
					  
					  // Relation of the logged in user
					  $relation = new Relation($mysqli, $user);
					  
					  //################# Profile user details ####################################
					  
					  $friend_id = $_GET['uid'];
					  
					  // Check if the profile is same as the logged in user
					  if ($friend_id === $user->getUserId()) {
					    $profile = $user;
					    $profile_relation = $relation;
					    $profile_friends = $relation->getFriendsList();
					  } else {
					    // Profile use details
					    $profile = (new User())->getUser($mysqli, $friend_id);

					    // Relation object for the current profile being showed
					    $profile_relation = new Relation($mysqli, $profile);

					    // Got the Friends list
					    $profile_friends = $profile_relation->getFriendsList();
					    
					    // Get the relationship between the current user and the profile user.
					    $relationship = $relation->getRelationship($profile);
					  }
					  // Checks if the profile is blocked
					  include('includes/blocked_profile.php');
					} 
					?>
					<?php if ($is_blocked === false) { ?>

					<?php

					// Check if the current user is not the profile user.
					if ($profile->getUserId() !== $user->getUserId()) {
					  // Check if user is there in any relationship record
					  if ($relationship !== false) {
					    switch ($relationship->getStatus()) {
					      case 0:
					        if ($relationship->getActionUserId() == $user->getUserId()) {
					          echo '<a href="user_action.php?action=cancel&friend_id=' . 
					                  $profile->getUserId() . '"><button class = "btn btn-default">Cancel Request</button></a>';
					        } else {
					          echo '<a href="user_action.php?action=accept&friend_id=' . 
					                  $profile->getUserId() . '"><button class = "btn btn-primary">Accept Request</button></a>';
					          echo '&nbsp;&nbsp;<a href="user_action.php?action=cancel&friend_id=' . 
					                  $profile->getUserId() . '"><button class = "btn btn-default">Cancel Request</button></a>';        
					        }
					      break;
					      case 1:
					        echo '<a href="user_action.php?action=unfriend&friend_id=' . 
					              $profile->getUserId() . '"><button class = "btn btn-default">Unfriend</button></a>';
					      break;
					      case 2:
					        echo '<small>Your request has been declined!</small>';
					      break;
					    }
					  } else if ($relationship === false) {
					    echo '<a href="user_action.php?action=add&friend_id=' . 
					            $friend_id . '"><button class = "btn btn-primary">Add Friend</button></a>';
					  }
					}
					}
					?>
					<br />
					
						</center>
			</div>
			<div class = "row" style="background-color: #e6f2ff; height: 30px;">
				
			</div>
			<div class = "row12">
				<div class="container" style="background-color: white; height: auto; padding-bottom: 20px; max-width: 265px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
					<div style="padding-top: 20px; font-weight: 800">About</div>
					<div class = "work" <?php if($work == 'Information Not Availaible') echo "style = 'display: none;'" ?>>
						<i class="fa fa-suitcase" aria-hidden="true" style="padding-top: 20px">    Works at <?php echo $work; ?></i>
					</div>
					<div class = "work" <?php if($study == 'Information Not Availaible') echo "style = 'display: none;'" ?>>
						<i class="fa fa-graduation-cap" aria-hidden="true" style="padding-top: 20px;">    Studied at <?php echo $study; ?></i>
					</div>
					<div class = "work" <?php if($lives == 'Information Not Availaible') echo "style = 'display: none;'" ?>>
						<i class="fa fa-address-card" aria-hidden="true" style="padding-top: 20px;">    Lives in <?php echo $lives; ?></i>
					</div>
					<div class = "work" <?php if($placefrom == 'Information Not Availaible') echo "style = 'display: none;'" ?>>
						<i class="fa fa-map-marker" aria-hidden="true" style="padding-top: 20px">    From <?php echo $placefrom; ?></i>
					</div>
				</div>
			</div>
			<div class = "row" style="background-color: #e6f2ff; height: 30px;">
				
			</div>
			<div class = "row12">
				<div class="container" style="background-color: white; height: auto; max-width: 265px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); padding-bottom: 20px;" id="myBtn1">
					<div style="padding-top: 20px; font-weight: 800; padding-bottom: 20px;">Photos</div>
					<?php
					$iii = $_GET['uid'];
		$query1 = "SELECT picture FROM posts WHERE post_from_id='$iii' and picture!='NULL' ORDER by post_id DESC LIMIT 8";
		$result1 = mysqli_query($conn,$query1);
		while ($row3 = mysqli_fetch_assoc($result1)) {
			if($row3['picture']!=NULL)
			?>
		<div style="padding-left: auto; margin: 1px solid black; padding-bottom: 10px;"><img src="<?php echo $row3['picture'] ?>" width="100%" height="auto" style="position: auto;"></div>
		<?php
		}
	?>
					
				</div>
			</div>
		</div>
		<div class="row12" style="padding-top: 20px;"></div>
		<div class ="col-lg-6" style="max-width: 590px; background-color: white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
			<div class="row1" style="padding-top: 20px; padding-bottom: 20px">

				<!--<form method="POST">							
					<textarea cols="80" rows="4" placeholder="What is on your mind??" style="max-width: 100%" name="post"></textarea>
					<div style="float: right;"><input class="btn btn-lg btn-primary btn-block" type="submit" name="sub01" value="Post in <?php if($useritselt == 0) echo $firstname.' Timeline'; else echo 'your Timeline'?> " style="width: 100%;"></div>
				</form>
				<?php
				if(isset($_POST['sub01'])){
					$post = $_POST['post'];
					$post_from_id = $arr['user_id'];
					$post_to_id = $_GET['uid'];
					$q14 = "INSERT INTO posts (post_from_id,post_to_id,post) VALUES ('$post_from_id','$post_to_id','$post')";
					mysqli_query($conn,$q14);
				}
				?>-->
				<form method="POST" enctype="multipart/form-data">							
					<textarea cols="80" rows="4" placeholder="What is on your mind??" style="max-width: 100%" name="post"></textarea>
					<div style="float: right;"><input class="btn btn-lg btn-primary btn-block" type="submit" name="sub01" value="Post" style="max-width: 100px;" >
					</div>
					<div style="padding-top: 10px; float: left;">
			          <input type="file" name="fileToUpload" id="fileToUpload"  onchange="preview_image(event)">
			          </div>
			          <img id="output_image" style="max-width: 300px; padding-top: 10px;" />

				</form>
				<?php
					if(isset($_POST['sub01']) && isset($_POST['fileToUpload'])){
					$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
					$rand_dir_name = substr(str_shuffle($chars), 0, 15);
					$target_dir = "uploads/post_pics/$rand_dir_name";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					if(isset($_FILES["fileToUpload"])) {
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
					/*if ($_FILES["fileToUpload"]["size"] > 500000) {
					    echo "Sorry, your file is too large.";
					    $uploadOk = 0;
					}*/
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

					}


				?>




			</div><div style="padding-top: 20px"></div>
			<hr />
			<div style="font-size: 30px; font-weight: 800; text-align: center;" ><?php if($useritselt == 1) echo 'Your Timeline'; else echo 'Timeline of '.$firstname; ?><hr/></div>
			<?php
					$post_of = $_GET['uid'];
					$q15 = "SELECT post_id,post,post_from_id,post_to_id,datetimer,picture FROM posts WHERE post_to_id = '$post_of' ORDER BY post_id DESC";
					$r15 = mysqli_query($conn,$q15);
					while($row15 = mysqli_fetch_assoc($r15)){						
						$userid012 = $_GET['uid'];
						$userposted012 = $row15['post_from_id'];
						$q16 = "SELECT user_id,first_name,last_name,profile_pic FROM users WHERE user_id = '$userposted012'";
						$r16 = mysqli_query($conn,$q16);
						$row16 = mysqli_fetch_assoc($r16);
						?>
						<div style="font-weight: 800";><img src="<?php echo $row16['profile_pic']; ?>" width="40px" height="40px" class = "img img-circle"><a href="prolife.php?uid=<?php echo $row16['user_id']; ?>">&nbsp;&nbsp;<?php echo $row16['first_name'].' '.$row16['last_name'] ?></a><div style="float: right;"><?php echo $row15['datetimer']; ?></div></div>
						<?php
		
						?><div style="color: black; padding-top: 10px;"><?php echo nl2br($row15['post']); ?></div>
						<div style=""><img src="<?php echo $row15['picture']; ?>"  style="width: 100%;"></div>
						<hr /><?php
					}

				?>
		</div>
		<div style="padding-left: 5px"></div>
		<div class="col-lg-3" style="max-width: 300px;  ">
			<div style="background-color: white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
				
				<div style="padding-top: 20px; font-weight: 800; "><center>Friends</center></div><hr />
				<div style='padding-left:10px; padding-bottom: 10px; text-decoration: none !important;'>
				<?php
					if (!empty($profile_friends)) {
  					
  						foreach ($profile_friends as $rel) {
    					$friend = $profile_relation->getFriend($rel);
    					$lastname11 = $friend->getUsername();
    					$q01 = "SELECT user_id,first_name,last_name,profile_pic FROM users WHERE username = '$lastname11' ORDER BY RAND()";
    					$r01 = mysqli_query($conn,$q01);
    					$l1 = mysqli_fetch_assoc($r01);
    					$l = $l1['last_name'];
    					$id = $l1['user_id'];
    					$f = $l1['first_name'];
    					$p = $l1['profile_pic'];?><div style="text-decoration: none !important">
    					<?php  if($l1['profile_pic']!=NULL) { ?>
    					<img src="<?php echo $p; ?>" width=40px; height = 40px; class = "img img-circle"><a href="profile.php?uid=<?php echo $id; ?>">&nbsp;&nbsp;<?php  echo $f.' '.$l; ?></a></div><hr />
    					<?php }  ?>
						
						<?php }  ?>
						<?php } 
						else 
						  echo '<center>No Friends<center>';
						
				?>
				</div>
				
				

			</div>
		</div>
	</div>
</div>










<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<!-- bootstrap.js -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>

<script>
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



//For photos

var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
</script>








</body>
</html>