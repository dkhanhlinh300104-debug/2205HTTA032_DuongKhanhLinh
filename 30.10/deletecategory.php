<?php
require_once "db.php";
$db = new DbHelper();
$id = $_GET['id'] ?? "";

if ($id) {
    $sql = "DELETE FROM categories WHERE id = ?";
    $db->delete($sql, [$id]);
}
header("Location: listofcategories.php");
exit;
?>
