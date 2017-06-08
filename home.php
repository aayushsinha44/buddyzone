<?php
$page = "home.php";
$sec = "900";
?>

<?php 
include('config/conn.php');
session_start();
$nullentry = 0;
if(isset($_SESSION['user_login'])){
	$username = $_SESSION['user_login'];
	$query = "SELECT user_id,first_name,last_name,about,work,study,lives,placefrom,profile_pic,cover_pic FROM users WHERE username = '$username'";
	$result = mysqli_query($conn,$query);
	$a= mysqli_fetch_assoc($result);
	$arr = mysqli_fetch_assoc($result);
	$userid = $a['user_id'];
	$firstname = $a['first_name'];
	$lastname = $a['last_name'];	
	$about = $a['about'];
	$work = $a['work'];
	$study = $a['study'];
	$lives = $a['lives'];
	$placefrom = $a['placefrom'];
	$profile = $a['profile_pic'];
	$cover = $a['cover_pic'];
}
else{
	header("Location: index.php");
}
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
		<li><a class="active" href="home.php">Home</a></li>
		<li><a  href="profile.php?uid=<?php echo $userid;?>"><?php echo $firstname; ?>'s Profile</a></li>

		
		<li class="dropdown" style="float: right;">
    		<a href="javascript:void(0)" class="dropbtn"><?php echo $firstname; ?> <span class="caret"></span></a>
    		<div class="dropdown-content">
      			<a href="update_photo.php">Update Your Photo</a>
      			<a href="update_details.php">Update Your Personal Details</a>
      			<a href="update_password.php">Update Your Password</a>
      			<a href="logout.php">Logout</a>
    		</div>
  		</li>
		<form method="POST">
		    <li><a><div style="color: black;"><input type="text" autocomplete="off" name = "query" placeholder="Search...." /></div></a></li>
		    <li><a><input type="submit" name="search" value="Search" class="btn btn-sm btn-primary"></a></li>
</form>
<div ><li id="myBtn" class="right"><a href="#">Notification</a></li></div>
	
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
			if( 1){
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


<div style="z-index: 99;  padding-left: 50%;padding-right: 35%">
<?php
if(isset($_POST['search'])){
	$query = mysqli_real_escape_string($conn, $_REQUEST['query']);
 
if(isset($query)){
    // Attempt select query execution
    $sql = "SELECT first_name,last_name,user_id FROM users WHERE first_name  LIKE '" . $query . "%' ORDER BY RAND() LIMIT 3";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
        	?><div style="background-color: white;height: auto;font-size: 18px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);"><?php
            while($row8 = mysqli_fetch_array($result)){
                echo "<div style='padding-top:10px;padding-left: 10px;'><p><a href='profile.php?uid=".$row8['user_id']."'>" . $row8['first_name'] . ' '.$row8['last_name']. "</a></p></div><hr />";
            }

        } 
        else
            echo "<div style='padding-top:10px;padding-left: 10px;'><p>No matches found for <b>$query</b></p></div></div>";
                    if(mysqli_num_rows($result)>2) {?><div style="padding-bottom: 20px; text-align: center;font-weight: 800;"><a href="">View More</a></div><?php }
        
    } 
}
}
?>
</div>
</div>

<div class = "container">
	<div class = "row">

<div style="padding-left: 5px"></div>
		<div class="col-lg-3" style="max-width: 300px; padding-top: 20px;">
<div class = "1container" style="background-color: #ffffb3; height: auto;">
				<div style="padding-top: 20px; font-weight: 800; padding-bottom: 10px;"><center>Notifications</center></div>
				<?php 
					$username = $_SESSION['user_login'];
					$query = "SELECT user_id,first_name,last_name,about,work,study,lives,placefrom,profile_pic,cover_pic FROM users WHERE username = '$username'";
					$result = mysqli_query($conn,$query);
					$a= mysqli_fetch_assoc($result);
					$id = $a['user_id'];
					$qu = "SELECT user_one_id,user_two_id,status,action_user_id FROM relationship";
					$re = mysqli_query($conn,$qu);
					while($row2 = mysqli_fetch_assoc($re)){
						if(($userid = $row2['action_user_id']) && $row2['status'] == 0){
							//
						}
						if(($row2['user_one_id'] == $row2['action_user_id']) && $row2['status'] == 0){
							if($row2['user_two_id'] == $id){
								$id1 = $row2['user_one_id'];
								$q7 = "SELECT first_name,last_name FROM users WHERE user_id = '$id1'";
								$r17 = mysqli_query($conn,$q7);
								$res = mysqli_fetch_assoc($r17);
								$fn1 = $res['first_name'];
								$ln1 = $res['last_name'];
								?>
								<div style="padding-left: 5px; padding-bottom: 10px;">You have recieved friend request from <a href="profile.php?uid=<?php echo $row2['user_one_id'] ?>"><?php echo $fn1." ".$ln1; ?></a></div>
								<?php
							}
						}
						if(($row2['user_two_id'] == $row2['action_user_id']) && $row2['status'] == 0){
							if($row2['user_one_id'] == $id){
								$id1 = $row2['user_two_id'];
								$q7 = "SELECT first_name,last_name FROM users WHERE user_id = '$id1'";
								$r17 = mysqli_query($conn,$q7);
								$res = mysqli_fetch_assoc($r17);
								$fn1 = $res['first_name'];
								$ln1 = $res['last_name'];
								?>

								<div style="padding-left: 5px; padding-bottom: 10px;">You have recieved friend request from <a href="profile.php?uid=<?php echo $row2['user_two_id'] ?>"><?php echo $fn1." ".$ln1;  ?></a></div>
								<?php
							}
						}
					}
				?>

			</div>
			<div style="background-color: white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); height: auto;">
				<div style="padding-top: 20px; font-weight: 800; "><center>People on buddyZone</center></div>
				<hr />
				<?php
					$q = "SELECT user_id,first_name,last_name,username,profile_pic FROM users ORDER BY RAND() LIMIT 10";
					$r = mysqli_query($conn,$q);
				    while($c = mysqli_fetch_assoc($r)){
				    	$pro = $c['profile_pic'];
				    	if($c['username']!= $_SESSION['user_login'] && $c['user_id']!=$userid){?>
				    	 <p><div style='padding-left:10px;'><img src =<?php echo $pro; ?> width=40px; height = 40px; class = "img img-circle" >&nbsp;&nbsp;<a href='profile.php?uid=<?php echo $c['user_id']; ?> '><?php echo $c['first_name'].' '.$c['last_name']; ?></a></div></p><hr />
				    	<p></p>				    <?php	}
				    }	
				?>
				<div style="padding-bottom: 20px; text-align: center;font-weight: 800;"><a href="">View More</a></div>
			</div>
</div>



			    <?php
			    	$target_file = NULL;
					if(isset($_POST['sub01']) && !empty($_FILES["fileToUpload"]["name"])){
						if($_FILES['fileToUpload']!=NULL){
					$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
					$rand_dir_name = substr(str_shuffle($chars), 0, 15);
					$target_dir = "uploads/post_pics/$rand_dir_name";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					/**if(isset($_POST["sub01"]) && isset($_FILES['fileToUpload'])) {
					    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					    if($check !== false) {
					        echo "File is an image - " . $check["mime"] . ".";
					        $uploadOk = 1;
					    } else {
					        echo "File is not an image.";
					        $uploadOk = 0;
					    }
					}**/
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
				}


				?>
				<?php
				if(isset($_POST['sub01'])){
					$post = $_POST['post'];
					$post_from_id = $a['user_id'];
					$post_to_id =$a['user_id'];
					//if($_POST['post']!= NULL){
					  if($target_file!=NULL){
						$q14 = "INSERT INTO posts (post_from_id,post_to_id,post,picture) VALUES ('$post_from_id','$post_to_id','$post','$target_file')";
					 }
					  else
						$q14 = "INSERT INTO posts (post_from_id,post_to_id,post) VALUES ('$post_from_id','$post_to_id','$post')";
						mysqli_query($conn,$q14);
					  //}
					//else{
						//$nullentry = 1;
					//}
				}
				?>


		<div class="row12" style="padding-top: 20px;"></div>
		<div class ="col-lg-6" style="max-width: 590px; background-color: white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
			<div class="row1" style="padding-top: 20px; padding-bottom: 20px">

				<form method="POST" enctype="multipart/form-data">							
					<textarea cols="80" rows="4" placeholder="What is on your mind??" style="max-width: 100%" name="post"></textarea>
					<div style="float: right;"><input class="btn btn-lg btn-primary btn-block" type="submit" name="sub01" value="Post" style="max-width: 100px;" >
					</div>
					<div style="padding-top: 10px; float: left;">
			          <input type="file" name="fileToUpload" id="fileToUpload"  onchange="preview_image(event)">
			          </div>
			          <img id="output_image" style="max-width: 300px; padding-top: 10px;" />

				</form>
			    <?php if($nullentry == 1) echo "<div style='color: red;'>Please Enter Something....</div>"; ?>
				
			</div><div style="padding-top: 20px"></div>
			<hr />
			<div  style="font-size: 30px; font-weight: 800; text-align: center;" >Newsfeed<hr/></div>
			<div class="wrap">
			<?php
			function isfriend($logged_in_user,$current_profile_user){
						$isfriend = 0;
						include('config/conn.php');
						if($logged_in_user!=$current_profile_user){
							$q11 = "SELECT user_one_id,user_two_id,status FROM relationship";
							$r11 = mysqli_query($conn,$q11);
							while($row11 = mysqli_fetch_assoc($r11)){
								
								if(($row11['user_one_id'] == $logged_in_user && $row11['user_two_id'] == $current_profile_user && $row11['status'] == 1) || ($row11['user_two_id'] == $logged_in_user && $row11['user_one_id'] == $current_profile_user && $row11['status'] == 1)){
									$isfriend = 1;
								}
							}
						}
						return $isfriend;
					}

			?>
			<?php
					$limit = 10;
					$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
					# sql query
					$q15 = "SELECT post_id,post,post_from_id,post_to_id,datetimer,picture FROM posts ORDER BY post_id DESC";
					# find out query stat point
					$start = ($page * $limit) - $limit;
					# query for page navigation
					if( mysqli_num_rows(mysqli_query($conn,$q15)) > ($page * $limit) ){
					  $next = ++$page;
					}
					$r15 = mysqli_query($conn,$q15 . " LIMIT {$start}, {$limit}");


					//$q15 = "SELECT post_id,post,post_from_id,post_to_id,datetimer,picture FROM posts ORDER BY post_id DESC";
					//$r15 = mysqli_query($conn,$q15);
					while($row15 = mysqli_fetch_assoc($r15)){						
						$post_to_id = $row15['post_to_id'];
						$post_from_id = $row15['post_from_id'];
						$q16 = "SELECT user_id,first_name,last_name,profile_pic FROM users WHERE user_id = '$post_from_id'";
						$q17 = "SELECT user_id,first_name,last_name,profile_pic FROM users WHERE user_id = '$post_to_id'";
						$r16 = mysqli_query($conn,$q16);
						$r17 = mysqli_query($conn,$q17);
						$row16 = mysqli_fetch_assoc($r16);
						$row17 = mysqli_fetch_assoc($r17);
							$username = $_SESSION['user_login'];
							$query = "SELECT user_id,first_name,last_name,about,work,study,lives,placefrom,profile_pic,cover_pic FROM users WHERE username = '$username'";
							$result = mysqli_query($conn,$query);
							$a= mysqli_fetch_assoc($result);
						$current_profile_user = $row17['user_id'];
						if(isfriend($a['user_id'],$current_profile_user) == 1  || $a['user_id'] == $row16['user_id']){
							if($row17['user_id'] == $row16['user_id'] ){
						?>
						<div class="item">
						<div style="font-weight: 800;"><img src = "<?php echo $row17['profile_pic'] ?>" width="40px" height="40px" class = "img img-circle">&nbsp;&nbsp;<a href="profile.php?uid=<?php echo $row17['user_id']; ?>"><?php echo $row17['first_name']." ".$row17['last_name']; ?></a><div style="float: right;"><?php echo $row15['datetimer']; ?></div></div>
						<?php
							}
							else{
						?>

						<div style="font-weight: 800;"><img src = "<?php echo $row16['profile_pic'] ?>" width="40px" height="40px" class = "img img-circle">&nbsp;&nbsp;<a href="profile.php?uid=<?php echo $row16['user_id']; ?>"><?php echo $row16['first_name']." ".$row16['last_name']; ?></a> Posted in <img src = "<?php echo $row17['profile_pic'] ?>" width="40px" height="40px" class = "img img-circle">&nbsp;&nbsp;<a href="profile.php?uid=<?php echo $row17['user_id']; ?>"><?php echo $row17['first_name']." ".$row17['last_name']; ?>'s Profile</a><div style="float: right;"><?php echo $row15['datetimer']; ?></div></div>

						<?php
							}
						?><div style="color: black; padding-top: 10px;"><?php echo nl2br($row15['post']); ?></div>
						<div style=""><img src="<?php echo $row15['picture']; ?>"  style="max-width: 100%;"></div>
						<hr /><?php
						}
					}

				?>
				
				</div>
				<?php if (isset($next)){ ?>
					  <div class="nav" style="bottom: 20px; font-size: 20px; text-decoration: none; text-align: center; padding-bottom: 20px; float: right;">
					    <a href='home.php?p=<?php echo $next?>'><button class="btn btn-default">Next</button></a>
					  </div>
					  <?php if(isset($_GET['p'])) $previous = $_GET['p'] - 1;  ?>
					  <?php if(isset($_GET['p'])) { ?>
					  <div class="nav" style="bottom: 20px; font-size: 20px; text-decoration: none; text-align: center; padding-bottom: 20px; float: left;">
					    <a href='home.php?p=<?php if(isset($_GET['p'])) echo $previous?>'><button class="btn btn-default">Previous</button></a>
					  </div>
  				<?php }  } ?>
		</div>
		</div>
	</div>
</div>











<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<!-- bootstrap.js -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ias.min.js"></script>

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




/**$(document).ready(function() {
    // Infinite Ajax Scroll configuration
    jQuery.ias({
      container : '.wrap', // main container where data goes to append
      item: '.item', // single items
      pagination: '.nav', // page navigation
      next: '.nav a', // next page selector
      loader: '<img src="css/ajax-loader.gif"/>', // loading gif
      triggerPageThreshold: 10 // show load more if scroll more than this
    });
  });**/
</script>
</body>
</html>