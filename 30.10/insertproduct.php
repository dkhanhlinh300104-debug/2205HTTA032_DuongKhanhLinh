<?php
require_once "db.php";
$db = new DbHelper();

$name = $_POST['name'] ?? "";
$catid = $_POST['catid'] ?? "";
$price = $_POST['price'] ?? "";
$description = $_POST['description'] ?? "";

if ($name && $catid && $price) {
    $sql = "INSERT INTO products(name, catid, price, description) VALUES (?, ?, ?, ?)";
    $db->insert($sql, [$name, $catid, $price, $description]);
}
header("Location: listofproducts.php");
exit;
?>
