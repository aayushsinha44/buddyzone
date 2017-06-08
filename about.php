<!DOCTYPE html>
<head>
	<title>About</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="font/css/font-awesome.css">

<style>
#btn-debug {
	position: absolute;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 50px;
  background-color: #f5f5f5;
}
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
  padding-top: 0px;
  padding-bottom: 0px;
}
#console-debug{
	position: absolute;
	top: 50px;
	left:0px;
	width: 30%;
	height: 500px;
	overflow-y: scroll;
	background-color: #ffffff;
	box-shadow: 5px 5px 5px #cccccc;
}
#console-debug pre{
	
}
</style>
  	<link rel="stylesheet" href="css/index.css">
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src"jquery/jquery-ui.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
		$("#console-debug").hide();

		$("#btn-debug").click(function(){
			$("#console-debug").toggle();
		});
	});
</script>        <style>
.signin{
	max-width: 360px;
	background-color: rgb(153, 204, 255);
	box-shadow: 3px 3px 5px #0073e6;
}
        </style>
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
                <a class="nav-link" href="index.php" style="color: #4da6ff; font-size: 20px;">Home</a>
                <a class="nav-link active" href="about.php" style="color: #4da6ff; font-size: 20px;">About</a>
                <a class="nav-link" href="contact.php" style="color: #4da6ff; font-size: 20px;">Contact</a></div>
              </nav>
            </div>
          </div>
        </div>

        

      </div>


</div>


<div class = "container" style="padding-top: 40px;">
			<div class = "row">
				<div class = "col-lg-4"></div>
				<div class = "col-lg-4">
					<div class = "signin" style = "text-align: center; font-size:28px; padding-bottom: 20px;">
						<p>This is a social networking site which is developed by Aayush Sinha, 2nd Semester, Birla Institute of Technology, Mesra.</p>
					</div>
				</div>
			</div>
		</div>

</body>
</html>