<?php
session_start();
require 'auth.php';	
	
?>
<!DOCTYPE html>
<html lang="en">

<html>
<head>
	<link  rel = "stylesheet" type = "text/css" href = "assets/stylesheet.css"/>
    <meta charset="utf-8" />
	<title>Visit South America - Nazca Adventures</title>
</head>
<header>
	<div class="header-bar">
		<div class="title">
			<a href="index.php"><h1>Nazca Adventures</h1></a> 
		</div>	
		<!---<div class="Login1">
			<button class="button"> <a href="login.php">Login</a></button>	
		</div> --->
		<div class="toprow-nav"> <!-- navigation bar -->
			<button class="head1"> <a href="all_adventures.php">View Adventures</a> </button> 		
			<button class="head1"> <a href="search_adventures.php">Search Adventures</a> </button>
			<button class="head1"> <a href="view_booked.php">Your Booked Adventures</a> </button>
			<button class="head1"> <a href="credits.html">Credits</a> </button>
		</div>
	</div>
	<div class="title-splash">
		<img src="assets/img_assets/main splash.jpg" alt="Nazca Lines 1" style="width:100%;">
	</div>
</header>

<body class="main">

<?php
	if (isset($_SESSION['username']))
	{
header("Location: index.php");
	}
?>
	
	<div class="content1">
		<h2>Login</h2>
		<form action="post_login.php" method="post">
			<p>Username: </p><input type="text" name="username" value="">
			<p>Password: </p><input type="password" name="password" value="">
			</br></br>
			<button type="submit" name="submit">Submit</button>			
		</form>
		<br> <br>
		<p>Create a new account: </p><button><a href="register.php">Register</a></button>
	</div>
	
</div>
</body>

<footer>
	<div class="footer-bar">
		<div class="botrow-nav"> <!-- navigation bar, login button on left -->
			<button class="head1"> <a href="all_adventures.php">View Adventures</a> </button> 		
			<button class="head1"> <a href="search_adventures.php">Search Adventures</a> </button>
			<button class="head1"> <a href="view_booked.php">Your Booked Adventures</a> </button>
			<button class="head1"> <a href="credits.html">Credits</a> </button>
		</div>
		<div class="footer-links">
			<h2> Other Adventures </h2>
			<button class="external1"><a href="#">Rio De Janiero</a> </button>
			<button class="external1"><a href="#">Buenos Aires</a> </button>
			<button class="external1"><a href="#">Santiago</a> </button>
			<button class="external1"><a href="#">Amazon Cruise</a> </button>
			<button class="external1"><a href="#">Machu Picchu</a> </button>
		</div>
		<div class="social-media">
			<img src="assets/img_assets/twitter.png" alt="Twitter" style="width:25px;height:25px;">
			<img src="assets/img_assets/fb.png" alt="Facebook" style="width:25px;height:25px;">
			<img src="assets/img_assets/yt.png" alt="YouTube" style="width:25px;height:18px;">
		</div>
		
	</div>
</footer>

</html>
	
