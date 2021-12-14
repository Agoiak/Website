<?php
session_start();
include ("dbconnections.php");
include ("functions.php");
check_loggedin();
check_login ($con);

?>




<!DOCTYPE html>
<html>
<head>
<title> Add Course </title>
<h2> Add Course </h2>
</head>

<body>
<?php
    check_login ($con);
    $sql = "SELECT * FROM courses";
    
    $result = mysqli_query($con, $sql);

    echo strval($result -> num_rows); 
    if ($result->num_rows > 0) {
    echo "<table style='width:75%'>
    <tr>
    <th>Course</th> 
    <th>Course Comments</th>
    </tr>";

        while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['course_name']. " </td><td> " . $row['course_comment']. "</td></tr>";
    }
        echo "</table>";
    }else {
        echo "0 results";
    }
?>

<form action ="insertcourse.php" method="post">


  <p>
   <label for="coursename">Enter Course Name:</label><br>
   <input type="text" name="coursename" id="coursename">
  </p>
  
  <p>
   <label for="coursecomment">Enter Course Comment:</label><br>
   <input type="text" name="coursecomment" id="coursecomment">
  </p>

  <br>

  <input type="submit" value="Submit" name="Submit" id="button"><br><br>


</form>


</body>

</html>