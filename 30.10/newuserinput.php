<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nhập dữ liệu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
	
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="col-lg-4 p-3 border rounded bg-light shadow">
			<h2>New Users</h2>
			
			<form method="post" action="insertuser.php" class="was-validated">
				<div class="my-3">
				  <label for="uname" class="form-label">Username</label>				
				  <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname"  required>
				  <div class="valid-feedback">Valid.</div>
				  <div class="invalid-feedback">Please fill out this field.</div>
				</div>
				
				<div class="my-3">
				  <label for="email" class="form-label">Email:</label>
				  <input type="email" class="form-control" id="email" placeholder="Your name" name="email" required>
				  <div class="valid-feedback">Valid.</div>
				  <div class="invalid-feedback">Please fill out this field.</div>
				</div>
				
				<button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
			</form>
		</div>
	</div>

	
	
	
	<script src="js/bootstrap.min.js"></script>
</body>
</html>