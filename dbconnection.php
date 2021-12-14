<?php

$dbhost = "localhost";
$dbusername = "admin";
$dbpassword = "admin";
$dbbase = "University";

if(!$con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbbase))
{
    die("Connection has failed!");
}

?>
