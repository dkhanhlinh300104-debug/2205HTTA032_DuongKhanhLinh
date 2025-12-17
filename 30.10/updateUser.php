

<?php
	$id = isset($_GET['id']) ? $_GET['id'] : "";
// Vẽ form hiển thị thông tin user có id lấy được từ database
	$sql = "select name, email from users where id = ?";
	require_once "db.php"; // Gọi 1 lần
	$db = new DbHelper();
	$st = $db->select($sql, [$id], true);	
	//var_dump($st);
	//die();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Update User</title>
</head>

<body>
	<div class ="container">
		<div class="row border justify-item-center shadow">
			<form method="post" action="edituser.php?id=<?php echo $id?>"> 
				<div class="mb-3">
					<label for="username" class="form-label">Username </label>
					<input type="text" id="username" name="username"class="form-control" value="<?php echo $st[0]->name;?>" disabled/>
				</div>
				<div class="mb-3">
					<label for="email" class="mb-3 form-label">Email </label>
					<input type="text" id="email" name="email"class="form-control" value= "<?php echo $st[0]->email; ?>" />
				</div>
				<div class="mb-3">
					<button type="submit" value ="Update" class = "btn btn-sm btn-primary mb-3"> Update </button>
				</div>
			</form>
		</div>
	</div>

	<script src="js/boostrap.min.js"> </script>
</body>
</html>