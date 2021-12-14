<?php
session_start();

include("dbconnection.php");
include("functions.php");
check_login($con);

$course = $_SESSION["course_id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $course_name = $_REQUEST['course_name'];
        $course_comment = $_REQUEST['course_comment'];
    
if ($_POST['delete'] == "Delete record"){
        $query = "DELETE FROM courses WHERE course_id = '$course'";
        $result = mysqli_query($con,$query);
        header("Location: findcourse.php");

}else{
        $query = " UPDATE courses SET course_name = '$course_name', course_comment= '$course_comment' WHERE course_id='$course' ";
}

$result = mysqli_query($con,$query);

} else
{
$query = "SELECT * FROM courses WHERE course_id = '$course' limit 1";
$result = mysqli_query($con,$query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
        $course_name = $row["course_name"];
        $course_comment = $row["course_comment"];
}

else {
die("dead");
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit a Course</title>
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

        <h2>Edit Course:</h2><hr>
        <br>

        <label> Course Name </label><br>
        <input id="text" type="text" name="course_name" value=<?php echo $course_name;?> id=course_name><br><br>

        <label> Course Comment </label><br>
        <input id="text" type="text" name="course_comment" value="<?php if (!$course_comment == "") {echo $course_comment;} ?>"<br><br>

        <br><input type="submit" value="Edit" id="button"><br><br>
        <input name = "delete" type = "submit" value= "Delete record" id="button"><br><br>

    </form>
</div>
</body>
</html>
