<?php 
	require_once "db.php";

	$uname = isset($_POST['uname']) ? $_POST['uname'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$sql = "insert into users (name, email, date_created) values (?, ?, ?)";

	$db = new DbHelper();
	$last_id = $db->insert($sql, [$uname, $email, date('Y-m-d H:i:s')]);
	
	echo "ID mới được chèn: " . $last_id;
	header("location: listofusers.php");

?>