<?php

session_start();

include ("dbconnection.php");
include ("functions.php");
check_loggedin();
check_login ($con);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $first_name =  $_REQUEST['firstname'];
  $last_name = $_REQUEST['lastname'];
  $user_name = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $phonenumber = $_REQUEST['phonenumber'];
  $address1 = $_REQUEST['address1'];
  $address2= $_REQUEST['address2'];
  $city = $_REQUEST['city'];
  $email = $_REQUEST['email'];

  $query = "UPDATE user_login SET firstname = '$first_name', lastname = '$last_name', username = '$user_name', password = '$password', 
              phone_number = '$phonenumber', address_1 = '$address1', address_2 = '$address2', city = '$city', email = '$email' 
                WHERE user_id = '$user_id'";

  if(!mysqli_query($con, $query)){
      die("Problem");
  }


}else 
{

  $query = "SELECT * FROM user_login WHERE user_id = '$user_id'";

  //echo "<b> <center>Database Output</center> </b> <br> <br>";

  $result = mysqli_query($con, $query);
  if ($result){
  $user_data = mysqli_fetch_assoc($result);

  $first_name = $user_data["firstname"];
  $last_name = $user_data["lastname"];
  $user_name = $user_data["username"];
  $password = $user_data["password"];
  $phonenumber = $user_data["phone_number"];
  $address1 = $user_data["address_1"];
  $address2 = $user_data["address_2"];
  $city = $user_data["city"];
  $email = $user_data["email"];
    

}
}
//
?>


<!DOCTYPE html>
<html>
<header>
<link href="styles.css" rel="stylesheet"> 
</header>
<body>

<ul>
		    <li><a href = "index.php">Home</a></li>
		    <li><a href = "accountmanagement.php">Account Management</a></li>
        <li><a href = "insertcourse.php">Add Course</a></li>
        <li><a href = "findcourse.php">Find Course</a></li>
        <li><a href = "logout.php">Logout</a></li>
</ul>

<form action ="accountmanagement.php" method="post">  

<h2>Account Management:</h2><hr>
<br>

<p>
   <label for="firstname">Enter Firstname:</label><br>
   <input type="text" name="firstname" value="<?php if (!$first_name == "") {echo $first_name;} ?>" id="firstname">
  </p>
  
  <p>
   <label for="lastname">Enter Lastname:</label><br>
   <input type="text" name="lastname" value="<?php if (!$last_name == "") {echo $last_name;} ?>" id="lastname">
  </p>

  <p>
    <label for="username">Enter Username:</label><br>
    <input type="text" name="username" value="<?php if (!$user_name == "") {echo $user_name;} ?>" id="username">
  </p>

  <p>
    <label for="password">Enter Password:<label><br>
    <input type="text" name="password" value="<?php if (!$password == "") {echo $password;} ?>" id="password">
  </p>

  <p>
    <label for="phonenumber">Enter Phone Number:<label><br>
    <input type="text" name="phonenumber" value="<?php if (!$phonenumber == "") {echo $phonenumber;} ?>" id="phonenumber">
  </p>

  <p>
    <label for="address1">Enter Address Line 1:<label><br>
    <input type="text" name="address1" value="<?php if (!$address1 == "") {echo $address1;} ?>"id="address1">
  </p>

  <p>
    <label for="address2">Enter Address Line 2:<label><br>
    <input type="text" name="address2" value="<?php if (!$address2 == "") {echo $address2;} ?>" id="address2">
  </p>

  <p>
    <label for="city">Enter City:<label><br>
    <input type="text" name="city" value="<?php if (!$city == "") {echo $city;} ?>" id="city">
  </p>

  <p>
    <label for="email">Enter Email:<label><br>
    <input type="text" name="email" value="<?php if (!$email == "") {echo $email;} ?>" id="email">
  </p>

  <br>

  <input type="submit" value="Update" id="button"><br><br>
</form>
</body>
</html>
