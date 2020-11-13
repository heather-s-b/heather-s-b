<?php
session_start();
require 'auth.php';	
?>
<!DOCTYPE html>
<html lang="en"> 

<html>
<head>
<link rel="icon" type="image/png" href="assets/fav.png"/>
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
		<?php
		$lob = '<div class="Login1">
			<button class="button"> <a href="post_logout.php">Logout</a></button>	
		</div>';
		if (isset($_SESSION['username']))
		{
			echo $lob;
		}
		else
		{
		header("Location: login.php");
		} ?>
	</div>
	<div class="title-splash">
		<img src="assets/img_assets/main splash.jpg" alt="Nazca Lines 1" style="width:100%;">
	</div>
</header>

<body class="main">


<div class="content-main">

	<div class="content1">
		<h1 class="title2">
			Visit Nazca!
		</h1>
		<p class="big">
			The Nazca Lines were first spotted when Faucette, an early Peruvian airline, began flying from Lima to Arequipa in the 1920s. 
			The pilots noticed lines criss-crossing the desert between the valleys of Palpa and Nazca.
			The pilots' discoveries led Toribio Mejia Xesspe, an archaeologist, to come to Nazca in 1926. His research arrived at the 
			conclusion that the lines were part of ancient sacred roads. Xesspe never flew over the area and so only saw straight lines; he missed the figures.
			A more worthy discovery of the lines was made in 1939 by Paul Kosok of Long Island University. Kosok came to Nazca to study the ancient 
			irrigation systems, the puquios (see below). He surveyed the channels and noted that over 50 of the underground aqueducts were still being 
			used. He was told of other, even older, ancient channels and so set out to the Nazca desert but found only long, shallow furrows. He thought 
			that perhaps these other ancient channels were very far away and so hired a small crop-dusting aircraft to go and find them. On the flight he 
			saw hundreds of lines and geometrical forms in the desert. He later recalled asking the pilot to follow one particular line and being somewhat 
			surprised at it leading to a bird! Kosok later met Maria Reiche, who then devoted her life to studying and preserving the lines.			
		</p>
	</div>

	<div class="content2">
		<img src="assets/img_assets/cahuachi1.jpg" alt=" Cahuachi" style="width:420px;height:309px;">
	</div>
	<div class="content2">
		<img src="assets/img_assets/Nazca_City1.jpg" alt="Nazca City" style="width:420px;height:309px;">
	</div>
	<div class="content2">
		<img src="assets/img_assets/chauchilla2.jpg" alt="Chauchilla Cemetery" style="width:420px;height:309px;">
	</div>
	<div class="content2">
		<img src="assets/img_assets/san_fernando2.jpg" alt="San Fernando" style="width:420px;height:309px;">
	</div>
	<div class="content2">
		<img src="assets/img_assets/Paredones2.jfif" alt="Los Paredones" style="width:420px;height:309px;">
	</div>
	<div class="content2">
		<img src="assets/img_assets/Lines1.jfif" alt="Book now" style="width:420px;height:309px;">
	</div>

	<div class="content1">
		<p class="big">
			Today's Nazca town is on the site of where the ancient Nazca civilization was based after the fall of its first capital, 
			Cahuachi, around AD 400. For much of their history, the Nazca people were based in the Ceremonial City of Cahuachi, an 
			ancient pilgrimage center 28 km southwest of modern Nazca. The society emerged around 100 BC and was active until around 
			AD 750. Its influence stretched from Cañete in the north to Acari in the south. The lower section of the Nazca Valley was 
			likely chosen to situate Cahuachi due to its abundant underground water, which allowed extensive irrigation for improved 
			agriculture.</br></br>
			This civilization was responsible for the famous Nazca lines, giant representations of animals and other designs that are 
			also seen on Nazca pottery and textiles found at Cahuachi. Discovered pottery fragments also suggest that the Nazca people 
			gathered in the desert to perform religious ceremonies, with objects being smashed as offerings to the gods in the sky.
			The fragments found in the desert among the Nazca Lines are mainly pieces of panpipes and whistles, suggesting the importance 
			of music in the religious rites.
		</p>
	</div>

</div>
</body>

<footer>
	<div class="footer-bar">
		<div class="botrow-nav"> <!-- navigation bar, login button on left -->
			<button class="head1"> <a href="all_adventures.php">View Adventures</a> </button> 		
			<button class="head1"> <a href="advsearch.php">Search Adventures</a> </button>
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
