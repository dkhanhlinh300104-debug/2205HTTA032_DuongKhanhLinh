<?php
require_once "db.php";
$db = new DbHelper();

$id = $_GET['id'] ?? "";
$name = $_POST['name'] ?? "";
$branch = $_POST['branch'] ?? "";

if ($id && $name && $branch) {
    $sql = "UPDATE categories SET name=?, branch=? WHERE id=?";
    $db->update($sql, [$name, $branch, $id]);
}

header("Location: listofcategories.php");
exit;
?>
