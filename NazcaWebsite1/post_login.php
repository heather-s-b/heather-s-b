<?php
session_start();
require 'auth.php';	

//setting parameters
$username = $_POST['username'];
$password = $_POST['password'];	
$pass_hash = sha1($password, FALSE);

//preparing statement  - checking if user exists
$sql_usr = $conn->prepare("SELECT username FROM customers WHERE username = ?");
$sql_usr->bind_param("s",$_POST['username']);
$sql_usr->execute();
$sql_usr->store_result();
$sql_usr->bind_result($row_usr);
$sql_usr->fetch();


if($row_usr == $username)
{
	echo "User found. Checking password... </br>";	
	//preparing statement- checking password hash
	$sql_pwd = $conn->prepare("SELECT password_hash FROM customers WHERE username = ?");
	$sql_pwd->bind_param("s",$_POST['username']);
	$sql_pwd->execute();
	$sql_pwd->store_result();
	$sql_pwd->bind_result($row_pwh);
	$sql_pwd->fetch();

	if ($pass_hash == $row_pwh)	
	{
		$_SESSION['username'] = $username;
		echo "Login Verified. Welcome back.";
		header('Refresh: 0; URL = index.php');
	}
	else
	{
		echo "Invalid Login. Are the password and username spelled correctly?";	
		header('Refresh: 2; URL = login.php');
	}
}
else
{
	echo "Invalid Login. Are the password and username spelled correctly?";
	header('Refresh: 2; URL = login.php');
}
?>