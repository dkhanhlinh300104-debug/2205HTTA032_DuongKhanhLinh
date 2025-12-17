<?php
	require_once "db.php"; // Gọi 1 lần
	
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$sql = "update users set email = ? where id = ?";
	
	$db = new DbHelper();
	$last_id = $db->update($sql, [$email, $id]);
	header("location: listofusers.php");

?>