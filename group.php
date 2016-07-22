<?php 
session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');
?>
<!DOCTYPE html>
<html>
<head>
<title>
USER PAGE
</title>
<style>
body
{
font-size:30px;font-familysylfaen;background-color:black;height:500px;
background-image:url(group1.jpg);background-repeat: no-repeat;background-position:center;background-color:rgb:black;background-size:cover;
}
fieldset
{background-color:rgba(0,0,0,0.7);width:250px;height:250px;color:white;}

</style>
</head>
<body><center><h1>CREATE A NEW GROUP</h1>
<form action="logout.php"><input type="submit" value="LOGOUT"></form><br><br>
<fieldset>
<form action="gadd.php" method="post"><br>
GROUPNAME : <br><br>
<input type="text" name="gname" placeholder="Groupname" style="background-color:rgb(130, 202, 250);color:black;font-size:25px;" required><br><br>
<input type="submit" value="CREATE" style="background-color:black;color:rgb(0, 65, 194);font-size:25px;font-family:sylfaen;">
</fieldset></center></body>
</html>
</form>

