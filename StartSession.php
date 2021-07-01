<?php
session_start();
if (isset($_SESSION['username']) and $_SESSION['type']!='new') {
    $user = $_SESSION['username'];
    $uid = $_SESSION['id'];
    if((time() - $_SESSION['last_time']) > 1200)
    {
        header('location: logout.php');
    }
    else
    {
        $_SESSION['last_time']= time();
    }
} else {
    session_destroy();
    $user = 'Guest';
}
?>