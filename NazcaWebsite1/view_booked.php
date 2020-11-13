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
	<title>Nazca Adventures - View Booked Adventures</title>
</head>

<header>
	<div class="header-bar">
		<div class="title">
			<a href="index.php"><h1>Nazca Adventures</h1></a> 
		</div>	
		
		
		<div class="toprow-nav">
			<button class="head1"> <a href="all_adventures.php">View Adventures</a> </button> 		
			<button class="head1"> <a href="search_adventures.php">Search Adventures</a> </button>
			<button class="head1"> <a href="view_booked.php">Your Booked Adventures</a> </button>
			<button class="head1"> <a href="credits.html">Credits</a> </button>
		</div>
		<?php //displays the logout button if user is logged in, redirects to login page otherwise
		$lob = '<div class="Login1">
			<button class="button"> <a href="post_logout.php">Logout</a></button>	
		</div>';		
		if (isset($_SESSION['username'])){echo $lob;}
		else{header("Location: login.php");}?>
	</div>
	<div class="title-splash">
		<img src="assets/img_assets/main splash.jpg" alt="Nazca Lines 1" style="width:100%;">
	</div>
</header>

<body class="main">
<div class="content-main">
    <div class="content1">
		<h2 class="title2">
			Your Booked Adventures
		</h2>
    </div>
<?php
$c_id = "";
$row = "";

//using the session ID to retrieve the associated booked activities
$sql = $conn->prepare("SELECT 
							customers.customerID, 
							booked_activities.activityID, booked_activities.number_of_tickets, booked_activities.date_of_activity, 
							activities.activity_name, activities.description, activities.location, activities.price
						FROM((
							customers INNER JOIN booked_activities ON customers.customerID = booked_activities.customerID)
							INNER JOIN activities ON activities.activityID = booked_activities.activityID)
						WHERE username = ?");
						
if (
	$sql->bind_param("s",$_SESSION['username'])	&&
	$sql->execute()	&&
	$sql->store_result() &&
	$sql->bind_result($c_id, $a_id, $tics, $date, $name, $desc, $loc, $price)
	)
{

	if ($sql->num_rows!=0)
	{	
		while ($sql->fetch())
		{
		//using activityID to retrieve correct activity image
		if ($a_id == '1')
		{$img = '<img src="assets/img_assets/Lines1.jfif" alt="Nazca Lines" style="width:420px;height:309px;">';}
		elseif ($a_id == '2')
		{$img ='<img src="assets/img_assets/nazca city.jpg" alt="Nazca City" style="width:420px;height:309px;">';}			
		elseif ($a_id == '3')
		{$img ='<img src="assets/img_assets/los-paredones1.jpg" alt="Los Paredones" style="width:420px;height:309px;">';}
		elseif ($a_id == '4')
		{$img ='<img src="assets/img_assets/cahuachi1.jpg" alt="Cahuachi" style="width:420px;height:309px;">';}	
		elseif ($a_id == '5')
		{$img ='<img src="assets/img_assets/chauchilla1.jpg" alt="Chauchilla" style="width:420px;height:309px;">';}
		elseif ($a_id == '6')
		{$img ='<img src="assets/img_assets/san fernando1.jpg" alt="San Fernando National Reserve" style="width:420px;height:309px;">';} 
		else
		{echo '<p>error - unable to select correct image</p>';}	
		
		echo 
	'<div class="adventure-panel">
		<form method="post" action="update_booked.php">
		<p hidden><select name="activityID"><option value ='.$a_id.'>'.$a_id.'</option></select><p>
		<h2>'.$name.'</h2>
		<div class="content2">
			'.$img.'
		</div>
		<div class="adventure-info">	
			<p>'.$desc.'</p> </br>	
			<h3>Where is it? </h3><p>'.$loc.'</p> </br>
			<h3>Price </h3><p>$'.$price.'</p> </br>
		</div>
		<h3>Booking Details</h3></br>
		<div class="adventure-info2">
			<p>Number of Tickets:'.$tics.' </p></br>
		</div>
		<div class="adventure-info2">	
			<p>Date: <p><p>'.$date.'</p>
		</div></br></br></br></br></br>
		<h3>Change your adventure </h3></br>
		<div class=""adventure-info2>	
			<select name="new_ticket_amount">';
			for($tickets = 1; $tickets <=6; $tickets++)
			{
				echo "<option value = ".$tickets.">".$tickets."</option>";
			}
			echo '</select>
			<button type="submit" name="update" value="tix">Update</button> <br></br>
		</div>
		<div class="adventure-info2">
			<input type="date" name="new_booking_date" value="'.$date.'">
			<button type="submit" name="update" value="date">Update</button></br></br>
		</div></br></br></br></br>
		<div class="adventure-info2">
			<button type="submit" name="update" value="delete">Delete</button></br></br>
		</div>	
		
	</form>	
	</div>
	';
	}}
}
else
{
	echo "You haven't booked any adventures yet!";
}
?>	
	
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