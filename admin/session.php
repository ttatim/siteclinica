<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
