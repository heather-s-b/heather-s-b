<?php
session_start();
require 'auth.php';	
						
//setting parameters						
$custID = rand(1000000, 9999999);
$uname = $_POST['username_submit'];
$fname = $_POST['customer_forename_submit'];
$sname = $_POST['customer_surname_submit'];
$dob = $_POST['date_of_birth_submit'];
$add1 = $_POST['customer_address1_submit'];
$add2 = $_POST['customer_address2_submit'];
$pcode = $_POST['customer_postcode_submit'];
$pass_hash = sha1(($_POST['password']), FALSE);

//creating session ID	
$_SESSION['username'] = $uname; 

//checking for duplicate usernames & preparing statement
$sql_usr = $conn->prepare("SELECT username FROM customers WHERE username = ?");
$sql_usr->bind_param("s",$_POST['username_submit']);
$sql_usr->execute();
$sql_usr->store_result();
$sql_usr->bind_result($row);
$sql_usr->fetch();


//verify lengths of input
$user_length = strlen($uname);
$dob_check; //check if date is at least 16 years in the past
$fname_length = strlen($fname);
$sname_length = strlen($sname);
$add1_length = strlen($add1);
$add2_length = strlen($add2);
$pcode_length = strlen($pcode);
$pword_length = strlen($_POST['password']);



if (empty($uname)||empty($fname)||empty($sname)||empty($dob)||empty($add1)||empty($add2)||empty($pcode)||empty($pass_hash))
{
	echo "error - please complete all form fields";
	header('Refresh: 3; URL = register.php');	
}
elseif ($row == $uname)
{
	echo "error - username already in use! ";
	header('Refresh: 3; URL = register.php');	
}
elseif ($user_length > 30 || $user_length < 2)
{
	echo "error - username must be between 2 and 30 characters long";
	header('Refresh: 3; URL = register.php');	
}
elseif ($fname_length > 50)
{
	echo "error - first name must be less than 50 characters long";
	header('Refresh: 3; URL = register.php');	
} 	
elseif ($sname_length > 50)
{
	echo "error - last name must be less than 50 characters long";
	header('Refresh: 3; URL = register.php');	
} 	
elseif ($add1_length > 200 || $add1_length < 3)
{
	echo "error - address must be between 3 and 200 characters long";
	header('Refresh: 3; URL = register.php');	
} 
elseif ($pcode_length > 10 || $pcode_length < 3)
{
	echo "error - postcode must be between 3 and 10 characters long";
	header('Refresh: 3; URL = register.php');	
} 
elseif ($pword_length > 20 || $pword_length < 6)
{
	echo "error - password must be between 6 and 20 characters long";
	header('Refresh: 3; URL = register.php');	
}
elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST['password'], $match))
{
	echo "error - Password can only contain letters and numbers";
	header('Refresh: 3; URL = register.php');	
}	
else
{	
	$sql_usr->close();
	//preparing statement
	$sql = $conn->prepare("INSERT INTO customers(customerID, username, password_hash, customer_forename, customer_surname, customer_postcode, customer_address1, customer_address2, date_of_birth)VALUES(?,?,?,?,?,?,?,?,?)");
	$sql->bind_param("issssssss",$custID,$uname,$pass_hash,$fname,$sname,$pcode,$add1,$add2,$dob);						
	$sql->execute();
	
	echo "New account created! Welcome, ".$fname;
	header('Refresh: 3; URL = index.php');	
	
	if ($sql->affected_rows != 1)
	{
		echo "error </br>" . mysqli_error($conn);
	}		
	$sql->close();
}
mysqli_close($conn);
	
?>	
