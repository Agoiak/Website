
        <?php
	
        session_start();
        include ("functions.php");
        include ("dbconnection.php");
        check_login ($con);

	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
	
        $first_name =  $_REQUEST['firstname'];
        $last_name = $_REQUEST['lastname'];
        $user_name = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $phonenumber = $_REQUEST['phonenumber'];
        $address1 = $_REQUEST['address1'];
        $address2= $_REQUEST['address2'];
        $city = $_REQUEST['city'];
        $email = $_REQUEST['email'];
	$user_id = rand();
          
	
	
        $sql = "INSERT INTO user_login (user_id, firstname, lastname, username, password, phone_number, address_1, address_2, city, email)  VALUES ('$user_id','$first_name', 
            '$last_name','$user_name','$password', '$phonenumber', '$address1', '$address2', '$city', '$email')";  
        if(mysqli_query($con, $sql)){
        
        $_SESSION['user_id'] = $user_id;
        
        header("location: login.php");
  
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($con);
        }
          
          
        // Close connection
        mysqli_close($con);
	}
?>

