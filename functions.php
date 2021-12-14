<?php

function check_login($con){
  $con = mysqli_connect("localhost", "admin", "admin", "University");
  if($con === false)
    {
    die("ERROR ". mysqli_connect_error ());
    }
  }
  //$_SESSION ['user_id'] = $user_id;
  $user_id = $_SESSION ["user_id"];
  //echo "$user_id";

function check_loggedin(){
  if (!isset($_SESSION['user_id']))
    {
        //echo ($_SESSION['user_id']);
        header("Location: login.php");
        die;
    }
  }

?>