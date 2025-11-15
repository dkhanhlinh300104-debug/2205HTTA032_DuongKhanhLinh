<?php
// logout.php
require_once 'config.php';
$_SESSION = [];
session_destroy();
header('Location: login.php');
exit;
