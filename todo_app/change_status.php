<?php
// change_status.php
require_once 'auth.php';
require_login();
$user_id = current_user_id();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$action = $_GET['action'] ?? '';

$allowed = ['pending','in_progress','completed'];
if ($id && in_array($action, $allowed)) {
    $stmt = $pdo->prepare("UPDATE tasks SET status = :status WHERE id = :id AND user_id = :uid");
    $stmt->execute(['status'=>$action,'id'=>$id,'uid'=>$user_id]);
}

header('Location: index.php');
exit;
