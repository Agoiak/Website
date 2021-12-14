<?php

session_start();
include ("functions.php");
check_loggedin();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);

}

header("Location: login.php");
die;