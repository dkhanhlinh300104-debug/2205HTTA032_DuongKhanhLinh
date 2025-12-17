<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Chào mừng bạn đến với lớp học</title>
  <style>
    .error {
      color: red;
    }
    b {
      color: green;
    }
  </style>
</head>
<body>
<?php
  $username = $email = "";
  $nameerr = $emailerr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
      $nameerr = "* Name is Required";
    } else {
      $username = check($_POST["username"]);
    }

    if (empty($_POST["email"])) {
      $emailerr = "* Email is Required";
    } else {
      $email = check($_POST["email"]);
    }
  }

  function check($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Username:
    <input type="text" name="username" value="">
    <span class="error"><?php echo $nameerr; ?></span>
    <br><br>

    Email:
    <input type="text" name="email" value="">
    <span class="error"><?php echo $emailerr; ?></span>
    <br><br>

    <input type="submit" value="Submit">
  </form>

<?php
  echo "Your username: <b>".$username."</b><br>";
  echo "Your email: <b>".$email."</b><br>";
?>
</body>
</html>
