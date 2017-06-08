<?php
$page = "home.php";
$sec = "60";
?>
<?php 
include('config/conn.php');
session_start();
$nullentry = 0;
if(isset($_SESSION['user_login'])){
	$username = $_SESSION['user_login'];
	$query = "SELECT user_id,first_name,last_name,about,work,study,lives,placefrom,profile_pic,cover_pic FROM users WHERE username = '$username'";
	$result = mysqli_query($conn,$query);
	$arr= mysqli_fetch_assoc($result);
	$userid = $arr['user_id'];
	$firstname = $arr['first_name'];
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
		<li><a class="navbar-brand" href="home.php"><div style="font-weight: 800; text-shadow: 4px 4px 4px #4da6ff; color: white; font-size: 36px;">dostiTime</div></a></li>
		<li><a href="home.php">Home</a></li>
		<li><a  href="profile.php?uid=<?php echo $userid;?>"><?php echo $firstname; ?>'s Profile</a></li>
		<li id="myBtn12"><a href="messages.php" class="active">Messages</a></li>

		
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

<div class = "container" style="padding-top: 20px;">
	<div class = "row">
		<div class = "col-lg-1"></div>
		<div class = "col-lg-3" >
			<div class="container" style=" box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);background-color: white; height: auto; max-width: 270px;">
				<div class="item">
					<?php
						$limit = 10;
						$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
						# sql query
						$q = "SELECT post_id,post,post_from_id,post_to_id,datetimer,picture FROM posts ORDER BY post_id DESC";
						# find out query stat point
						$start = ($page * $limit) - $limit;
						# query for page navigation
						if( mysqli_num_rows(mysqli_query($conn,$q)) > ($page * $limit) ){
							$next = ++$page;
							}
						$r = mysqli_query($conn,$q. " LIMIT {$start}, {$limit}");

					?>


				</div>
				<?php if (isset($next)){ ?>
					  <?php if (isset($next)){ ?>
					  <div class="nav" style="bottom: 20px; font-size: 20px; text-decoration: none; text-align: center; padding-bottom: 20px; float: right; bottom:  0px;">
					    <a href='home.php?p=<?php echo $next?>'>Next</a>
					  </div>
					  <?php if(isset($_GET['p'])) $previous = $_GET['p'] - 1;  ?>
					  <?php if(isset($_GET['p'])) { ?>
					  <div class="nav" style="bottom: 20px; font-size: 20px; text-decoration: none; text-align: center; padding-bottom: 20px; float: left; bottom: 0px;">
					    <a href='home.php?p=<?php if(isset($_GET['p'])) echo $previous?>'>Previous</a>
					  </div>
  				<?php }  } } ?>
			</div>


		</div>
		<div class="col-lg-6" style=" box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);background-color: white;height: 300px;padding-left: 20px;">

		</div>
		<div class = "col-lg-1"></div>
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