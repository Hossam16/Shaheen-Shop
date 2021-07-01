<?php
session_start();
session_unset();
$_SESSION['FULLNAME'] = NULL;
$_SESSION['EMAIL'] =  NULL;
session_destroy();
header('location: index.php');
?>