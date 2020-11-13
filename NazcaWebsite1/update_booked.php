<?php //function to update and/or delete booked activities goes here
session_start();
require 'auth.php';	

//setting parameters
$a_id = $_POST['activityID'];
$new_ticket_num  = $_POST['new_ticket_amount'];
$new_date = $_POST['new_booking_date'];


switch ($_POST['update']) //switch to handle three different form options - change tickets, change date, or delete booking
{
	//changing tickets
	case 'tix':
		//retrieving customer ID using session
		$sql_cid = $conn->prepare("SELECT customerID FROM customers WHERE username = ?");
		$sql_cid->bind_param("s",$_SESSION['username']);
		$sql_cid->execute();
		$sql_cid->store_result();
		$sql_cid->bind_result($c_id);
		$sql_cid->fetch();

		//preparing statement
		$sql_tics = $conn->prepare("UPDATE booked_activities SET number_of_tickets = ? WHERE  customerID = ? AND activityID = ? LIMIT 1");
	
		if($sql_tics &&
			$sql_tics->bind_param("iii",$new_ticket_num, $c_id, $a_id ) &&
			$sql_tics->execute() &&
			$sql_tics->affected_rows === 1)
		{
			echo "Tickets successfully updated";
			header('Refresh: 2; URL = view_booked.php');	
		}
		else
		{
			echo "error  " .mysqli_error($conn);
			header('Refresh: 6; URL = view_booked.php');
		}		
	break;

	//changing date
	case 'date':	
		//retrieving customer ID using session	
		$sql_cid = $conn->prepare("SELECT customerID FROM customers WHERE username = ?");
		$sql_cid->bind_param("s",$_SESSION['username']);
		$sql_cid->execute();
		$sql_cid->store_result();
		$sql_cid->bind_result($c_id);
		$sql_cid->fetch();
		
		echo "Attempting to change date... </br>customer ID: ".$c_id."</br> activity ID: ".$a_id."</br>"; //debug line

		$sql_date=$conn->prepare("UPDATE booked_activities SET date_of_activity =? WHERE  customerID = ? AND activityID = ? LIMIT 1");

		if($sql_date &&
			$sql_date->bind_param("sii",$new_date, $c_id, $a_id ) &&
			$sql_date->execute() &&
			$sql_date->affected_rows === 1)
			{
				echo "Date successfully updated";
				header('Refresh: 2; URL = view_booked.php');	
			}
			
			else
			{
				echo "error - " .mysqli_error($conn);
				header('Refresh: 6; URL = view_booked.php');
			}		
	break;

	//deletion of booked adventure
	case 'delete':
		//retrieving customer ID using session	
		$sql_cid = $conn->prepare("SELECT customerID FROM customers WHERE username = ?");
		$sql_cid->bind_param("s",$_SESSION['username']);
		$sql_cid->execute();
		$sql_cid->store_result();
		$sql_cid->bind_result($c_id);
		$sql_cid->fetch();
		
				echo "Attempting to delete... </br>customer ID: ".$c_id."</br> activity ID: ".$a_id."</br>"; //debug line
			
		$sql_del = $conn->prepare("DELETE FROM booked_activities WHERE customerID= ? AND  activityID = ? LIMIT 1");		
		
		if($sql_del &&
			$sql_del->bind_param("ii",$c_id, $a_id ) &&
			$sql_del->execute() &&
			$sql_del->affected_rows === 1)	
			{	
				echo "Adventure successfully cancelled";
				header('Refresh: 2; URL = view_booked.php');	
			}
		else
		{
			echo "error - " .mysqli_error($conn);
			header('Refresh: 6; URL = view_booked.php');
		}	
	break;
}


?>