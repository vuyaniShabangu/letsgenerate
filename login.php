<?php
session_start();
	include('config.php');
	
	//$recievedArray = json_decode($_POST['json']);
	$email = $_POST['email'];
	$password = htmlspecialchars($_POST['password']);
	
	$sql = "SELECT * FROM  `user` WHERE  `email` =  '".$email."'";
	//echo $recievedArray->alias;
	
	$result = mysqli_query($con, $sql);
	
	$row = $result->fetch_assoc();
	
	
	if($row['password'] == $password)
	{
		
		$_SESSION['user_id'] = $row['id'];
		header('Location: instructions.html');
	}
	else
	{
		
		echo ("Incorrect login details. Please try again.");
	}
?>