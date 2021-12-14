<?php
session_start();

	include("dbconnection.php");
	include("functions.php");
	check_login($con);
	$msg = "";
	

	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$course_name = strtoupper($_POST['course_name']);
		$course_comment = $_POST['course_comment'];
		if(!empty($course_name) && !empty($course_comment)){
		 
			//Checks if database has subject already.
			$query = "select * from courses where course_name = '$course_name'"; 
			$result = mysqli_query($con, $query);
			if($result && mysqli_num_rows($result) > 0){
				$msg = $course_name." is already used";
				
			} else {
				
			
				//save to database
				$course_id = rand();
				$query = "insert into courses (course_id,course_name,course_comment) values ('$course_id','$course_name','$course_comment')";
				//echo $query;
				mysqli_query($con, $query);
				$msg = $course_name." has been added";
			}
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
<title> Courses </title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<ul>
		<li><a href = "index.php">Home</a></li>
		<li><a href = "accountmanagement.php">Account Management</a></li>
        <li><a href = "insertcourse.php">Add Course</a></li>
        <li><a href = "findcourse.php">Find Course</a></li>
        <li><a href = "logout.php">Logout</a></li>
</ul>

<div id="box">

		<form method="post">
		<h2>Add Course:</h2><hr>
		<br>
<?php
	$sql = "SELECT * FROM courses";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
    // output data of each row
    echo "<table style='width:70%'>
	<tr>
    <th>Course</th> 
    <th>Comments</th>
	</tr>";

		while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['course_name']. " </td><td> " . $row['course_comment']. "</td></tr>";
	}
		echo "</table>";
    }else {
		echo "0 results";
	}
?>
			<!---<div>Signup</div> --->
			<br>	
			<label>Subject Name</label><br>
			<input id="text" type="text" name="course_name"><br><br>
			
			<label> Comment </label><br>
			<input id="text" type="text" name="course_comment"><br><br>
			
			<input id="button" type="submit" value="submit"><br><br>
			
			<label> <?php echo $msg; ?> </label> <br>
			
			<a href="index.php">Back to Homepage</a>
</form>
</div>
</body>
</html>