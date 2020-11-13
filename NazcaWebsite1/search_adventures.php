<?php
session_start();
require 'auth.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link  rel = "stylesheet" type = "text/css" href = "assets/stylesheet.css"/>
    <meta charset="utf-8" />
	<title>Visit South America - Nazca Adventures</title>
</head>
</html>
<!DOCTYPE html>
<html>
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
		<h2 class="title2">Search Adventures</h2>
		<form action="" method="POST">
			<input type="text" name="query">
			<input type="submit" name="search" value="Search">
		</form>
	</div>
<?php
if (isset($_POST["search"]))
{
	//setting query parameter
	$query = $_POST['query'];
	$query = htmlspecialchars($query);
	$query = '%'.$query.'%';
	
	//preparing statement
	$sql = $conn->prepare("SELECT * FROM activities WHERE activity_name LIKE ?");
	
	if($sql->bind_param("s",$query) &&
		$sql->execute() &&
		$sql->store_result() &&
		$sql->bind_result($id, $name, $desc, $price, $loc))
	{
		if ($sql->num_rows!=0)
		{	
			while ($sql->fetch())
			{ 
			//if statements to ensure correct image appears with search results	
				if ($id == '1')
				{$img = '<img src="assets/img_assets/Lines1.jfif" alt="Nazca Lines" style="width:420px;height:309px;">';}
				elseif ($id == '2')
				{$img ='<img src="assets/img_assets/nazca city.jpg" alt="Nazca City" style="width:420px;height:309px;">';}			
				elseif ($id ==  '3')
				{$img ='<img src="assets/img_assets/los-paredones1.jpg" alt="Los Paredones" style="width:420px;height:309px;">';}
				elseif ($id == '4')
				{$img ='<img src="assets/img_assets/cahuachi1.jpg" alt="Cahuachi" style="width:420px;height:309px;">';}	
				elseif ($id == '5')
				{$img ='<img src="assets/img_assets/chauchilla1.jpg" alt="Chauchilla" style="width:420px;height:309px;">';}
				elseif ($id == '6')
				{$img ='<img src="assets/img_assets/san fernando1.jpg" alt="San Fernando National Reserve" style="width:420px;height:309px;">';} 
				else
				{echo '<p>error - unable to select correct image</p>';}	
				
				//html search results panel
				echo 
				'<div class="adventure-panel">
					<form method="post" action="book.php">
						<p hidden><select name="activityID"><option value ='.$id.'>'.$id.'</option></select><p>
					<h2 class="adv-title">'.$name.'</h2>
					<div class="content2">
						'.$img.'
					</div>
					<div class="adventure-info">	
						<p>'.$desc.'</p> 	
						<h3>Where is it? </h3><p>'.$loc.'</p> </br>
						<h3>Price </h3><p>$'.$price.'</p> </br>
					</div>
						<div class="adventure-info2">
							<p>Number of Tickets: </p>
							<select name="ticket_amount">';
							for($tickets = 1; $tickets <=6; $tickets++)
							{
								echo "<option value = ".$tickets.">".$tickets."</option>";
							}
							echo '</select></br> 
						</div>
						<div class="adventure-info2">
							<p>Date: </p>
							<input type="date" name="booking_date" value="">
						</div></br></br></br></br></br>
						<div class="adventure-info2">
							<button type="submit" name="submit">Book Now!</button></br></br>
						</div>	
					</form>
				</div>';
			}	
		}
		else
		{
			echo'<p>No activities found. Perhaps you could phrase your search in a different way?</p>';
		}
	}
	else
	{
		echo'<p>No activities found. Perhaps you could phrase your search in a different way?</p>';
	}	
}?>


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