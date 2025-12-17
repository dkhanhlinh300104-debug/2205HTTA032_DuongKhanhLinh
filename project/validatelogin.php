<?php	
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== "admin")
	{
		header("location: login.php");
		exit;
	}

?>
