<?php
// delete_task.php
require_once 'auth.php';
require_login();
$user_id = current_user_id();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id AND user_id = :uid");
    $stmt->execute(['id'=>$id,'uid'=>$user_id]);
}
header('Location: index.php');
exit;
