<?php
require_once '../supports/initialize.php';


session_start();

check_logged_in();

$_SESSION['logged_in'] = false;
redirect("index.php");

?>