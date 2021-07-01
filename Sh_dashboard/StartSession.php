<?php
session_start();
if (isset($_SESSION['username']) and $_SESSION['type']!='new') {
    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];
} else {
    session_destroy();
    $user = 'Guest';
}
?>