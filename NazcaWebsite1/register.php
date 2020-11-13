
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

		<div class="toprow-nav"> <!-- navigation bar, login button on left -->
			<button class="head1"> <a href="all_adventures.php">View Adventures</a> </button> 		
			<button class="head1"> <a href="search_adventures.php">Search Adventures</a> </button>
			<button class="head1"> <a href="view_booked.php">Your Booked Adventures</a> </button>
			<button class="head1"> <a href="credits.html">Credits</a> </button>
		</div>
				<div class="Login1">
			<button class="button"> <a href="login.php">Login</a></button>	
		</div>
	</div>
	<div class="title-splash">
		<img src="assets/img_assets/main splash.jpg" alt="Nazca Lines 1" style="width:100%;">
	</div>
</header>

<body class="main">
		
<div class="content-main">
	<div class="content1">
		<div class="registerLine">
			<form action="post_reg.php" method="post">
			<!--- registration form -->
                <p>Username: </p><input type="text" name="username_submit" value="">					
                <p>First Name(s): </p><input type="text" name="customer_forename_submit" value="">
                <p>Surname: </p><input type="text" name="customer_surname_submit" value="">
                <p>Date Of Birth: </p><input type="date" name="date_of_birth_submit" value="">
                <p>Address 1: </p><input type="text" name="customer_address1_submit" value="">
                <p>Address 2: </p><input type="text" name="customer_address2_submit" value="">
                <p>Postcode: </p><input type="text" name="customer_postcode_submit" value="">
                <p>Create Password: </p><input type="password" name="password" value=""> 
				<br> </br>
				<button type="submit" name="submit">Submit</button>
				
				</br></br>
				<p>Login to existing account: </p><button><a href="login.php">Login</a></button>
			</form>
		</div>
    </div>
</div>
</body>

<footer>
	<div class="footer-bar">
		<div class="botrow-nav">
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