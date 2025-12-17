<?php
require_once "db.php";
$db = new DbHelper();

$id = $_GET['id'] ?? "";
$name = $_POST['name'] ?? "";
$catid = $_POST['catid'] ?? "";
$price = $_POST['price'] ?? "";
$description = $_POST['description'] ?? "";

if ($id && $name && $catid && $price) {
    $sql = "UPDATE products SET name=?, catid=?, price=?, description=? WHERE id=?";
    $db->update($sql, [$name, $catid, $price, $description, $id]);
}
header("Location: listofproducts.php");
exit;
?>
