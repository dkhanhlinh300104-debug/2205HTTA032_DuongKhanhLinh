<?php
	require_once "db.php";
	$db = new DbHelper();
	$id = isset($_GET['id'])?$_GET['id'] : "";
	//die($id);
	if ($id != "")
	{
		$sql = "delete from users where id = ?";
		if($db->delete($sql, [$id]) > 0)
			header("location: listofusers.php");
	}
	
?>