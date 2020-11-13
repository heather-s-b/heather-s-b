<?php
///function to add activities to the Booked_activities table goes here
session_start();
require 'auth.php';	

$sql_cid = "SELECT customerID FROM customers WHERE username = '".$_SESSION['username']."'";	
$get_cid = mysqli_query($conn, $sql_cid) or die(mysqli_error());

$date = $_POST['booking_date'];
$t_num = $_POST['ticket_amount'];
$a_id = $_POST['activityID'];
$today = date("Y-m-d 0:0:0");
$c_id = "";
	
if ($date <= $today)
{
	echo "You can't book holidays in the past!";
	header('Refresh: 2; URL = all_adventures.php');
}
else
{	
	if (mysqli_num_rows($get_cid)==1)
	{
		while ($row_cid = Mysqli_fetch_assoc($get_cid))
		{
			$c_id = $row_cid['customerID'];		
			//preparing insert statement
			$sql=$conn->prepare("INSERT INTO booked_activities (activityID, customerID, date_of_activity, number_of_tickets)VALUES(?, ?, ?, ?)");
			$sql->bind_param("iisi", $a_id, $c_id, $date, $t_num);
			
			if ($sql->execute())	
			{
				echo "activity successfully booked";
				header('Refresh: 2; URL = view_booked.php');
			}
			else 
			{
				echo "error - activity not booked" . mysqli_error($conn);
				header('Refresh: 2; URL = all_adventures.php');
			}			
		}
	}
}

?>
		