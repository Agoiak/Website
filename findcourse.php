<?php
session_start();

include("dbconnection.php");
include("functions.php");
check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //subject name was posted
        $course_name = strtoupper($_POST['course_name']);

        if(!empty($course_name))
        {

            //reading from the database
            $query = "SELECT * FROM courses WHERE course_name = '$course_name' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $course_data = mysqli_fetch_assoc($result);

                    {

                        $_SESSION['course_id'] = $course_data['course_id'];
                        header("Location: editcourse.php");
                        die;
                    }
                }
            }

            echo "Cannot find Subject";
        }else
        {
            echo "Cannot find Subject";
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
<title>Course Finder</title>
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

        <h2>Find Course:</h2><hr>
        <br>
        
        <label> Course Name </label><br>
        <input id="text" type="text" name="course_name"><br><br>
        <input id="button" type="submit" value="Find"><br><br>

        </form>
    </div>
</body>
</html>