<?php

session_start();
include ("functions.php");

if(!($_POST['action1'] == 'Register')){
  header ("Location: login.php");
  die;
}
?>



<!DOCTYPE html>
<html>
<head>
<link href="styles.css" rel="stylesheet"> 
<title>Registeration </title>
</head>
<body>


<form action ="insert.php" method="post" id="form">

<h2> Registration:</h2><hr>
<br>

  <p>
   <label for="firstname">Enter Firstname:</label><br>
   <input type="text" name="firstname" id="firstname">
  </p>
  
  <p>
   <label for="lastname">Enter Lastname:</label><br>
   <input type="text" name="lastname" id="lastname">
  </p>

  <p>
    <label for="username">Enter Username:</label><br>
    <input type="text" name="username" id="username">
  </p>

  <p>
    <label for="password">Enter Password:<label><br>
    <input type="text" name="password" id="password">
  </p>

  <p>
    <label for="phonenumber">Enter Phone Number:<label><br>
    <input type="text" name="phonenumber" id="phonenumber">
  </p>

  <p>
    <label for="address1">Enter Address Line 1:<label><br>
    <input type="text" name="address1" id="address1">
  </p>

  <p>
    <label for="address2">Enter Address Line 2:<label><br>
    <input type="text" name="address2" id="address2">
  </p>

  <p>
    <label for="city">Enter City:<label><br>
    <input type="text" name="city" id="city">
  </p>

  <p>
    <label for="email">Enter Email:<label><br>
    <input type="text" name="email" id="email">
  </p>

  <br>

  <input type="submit" value="Submit" id="button"><br><br>

 <a href="login.php">Login</a>


</form>

</body>

</html>
