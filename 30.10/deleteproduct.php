<?php
require_once "db.php";
$db = new DbHelper();
$id = $_GET['id'] ?? "";

if ($id) {
    $sql = "DELETE FROM products WHERE id = ?";
    $db->delete($sql, [$id]);
}
header("Location: listofproducts.php");
exit;
?>
