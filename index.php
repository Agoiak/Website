<?php  

session_start();

include ("functions.php");
check_loggedin();
check_login ($con);



  
?>

<!DOCTYPE html>
<html>
<head>
<title>Educational Management Home</title>    
<link href="styles.css" rel="stylesheet"> 
</head>
<body>
<style>
body {
  background-image: url('backgroundimage.jpg');
  background-size: cover;
}
table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
  table-layout: fixed;
}

table.center {
  margin-left: auto; 
  margin-right: auto;
  width: 1200px; 
}
</style>

<ul>
		    <li><a href = "index.php">Home</a></li>
		    <li><a href = "accountmanagement.php">Account Management</a></li>
        <li><a href = "insertcourse.php">Add Course</a></li>
        <li><a href = "findcourse.php">Find Course</a></li>
        <li><a href = "logout.php">Logout</a></li>
</ul>

<br><h1 style="text-align:center"> Educational Management Home </h1>    
<table style="width:100%">

<br><p style="text-align:center">Welcome <strong> <?php echo $_SESSION['myusername']; ?></strong> to your course management area.</p><br>

<table class="center">
    
    <tr>
        <th style="text-align:center"><u><b>Information About This Website</b></u></th>
        <th style="text-align:center"><u><b>Information About User Account</b></u></th>
    </tr>

    <tr>
        <td style="text-align:center"><br>This website is allows you to manage courses in a variety of ways! Whether that be add news courses, editing them or deleting old courses.<br>
        <img src="books.jpg" style="width:400px;height:200px;">
        </td><br>

        <td style="text-align:center"><br>There are tools on this website which will allow you to edit your user information. So you can keep your user information up to date.
        No matter what changes in your life!<br>
        <img src="usersettings.jpg" style="width:400px;height:200px;">
        </td><br>
    </tr>

    <tr>
        <th style="text-align:center"><u><b>Course information</u></b></th>
        <th style="text-align:center"><u><b>Enjoy!</u></b></th>
    </tr>

    <tr>
        <td style="text-align:center"><br>You can add, edit and delete courses on this page. As well as manage what courses you are currently teaching!<br>
        <img src="subjects.jpg" style="width:400px;height:200px;">
        </td><br>

        <td td style="text-align:center">Use the site to furfill all of your educational management needs!<br>
        <img src="fireworks.jpg" style="width:400px;height:200px;">
        </td>
    </tr>

</table>

</body>

</html>
