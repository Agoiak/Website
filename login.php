<?php

session_start();

include ("dbconnection.php");
include ("functions.php");
check_login ($con);


if($_SERVER["REQUEST_METHOD"] == "POST") {


if($_POST['action1'] == 'Register'){
   header ("Location: register.php");
   die;
}else{
}

   $myusername =$_POST['username'];
   $mypassword =$_POST['password']; 
   
   $sql = "SELECT * FROM user_login WHERE username = '$myusername' and password = '$mypassword'";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $user_id = $row['user_id'];
   $_SESSION ['user_id'] = $user_id;
   
   $count = mysqli_num_rows($result);
   
   if($count == 1) {
      $_SESSION['myusername'] = $myusername;
      header("location: index.php");
   }else {
      $error = "Your Login Name or Password is invalid";
   }
}
  
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="styles.css" rel="stylesheet"> 
</head>
<body>
<form action ="login.php" method="post">

<h2>Login:</h2><hr>
<br>

<p>
   <label for="username">Enter Username:</label><br>
   <input type="text" name="username" id="username">
</p>

<p>
   <label for="password">Enter Password:</label><br>
   <input type="password" name="password" id="password">
</p>

<br><input type="submit" name="action" formaction="\login.php" value="Submit" id="button"><br>
<br><input type="submit" name="action1" formaction="\register.php" value="Register" id="button"><br><br>


<?php echo $error; ?><br><br>

</form>


</body>

</html>
