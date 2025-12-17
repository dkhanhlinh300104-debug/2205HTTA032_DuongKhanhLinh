<?php
require_once "db.php";
$db = new DbHelper();

$name = $_POST['name'] ?? "";
$branch = $_POST['branch'] ?? "";

if ($name && $branch) {
    $sql = "INSERT INTO categories(name, branch) VALUES (?, ?)";
    $db->insert($sql, [$name, $branch]);
}

header("Location: listofcategories.php");
exit;
?>
