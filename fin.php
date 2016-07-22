<?php session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');?><!DOCTYPE html>
<html>
<head>
<title>
FINANCE
</title>
</head>
<style>
div
{
box-shadow:5px 5px 3px #357EC7;font-size:30px;font-family:sylfaen;background-color:rgba(59, 185, 255,0.8);width:50%;padding:40px;
}
h1
{
box-shadow:5px 5px 3px #357EC7;font-size:45px;font-family:sylfaen;background-color:rgba(59, 185, 255,0.8);width:50%;padding:40px;
}
</style>
<center>
<?php
// Create connection
$conn = new mysqli("localhost", "root", "","Globville");
// Check connection
$UN=$_SESSION["UN"];
$sql = "SELECT SUM(Money) FROM Finance WHERE Fromwho='$UN'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$l=$row["SUM(Money)"];
echo "<center><h1><u>MY ACCOUNT</u></h1><div>";
echo "MONEY LENT : Rs ".$row["SUM(Money)"]."<br>";
$sql="UPDATE Profile SET Lent='$l' WHERE Username='$UN'";
$result = $conn->query($sql);
$sql = "SELECT SUM(Money) FROM Finance WHERE Towho='$UN'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$o=$row["SUM(Money)"];
$sql="UPDATE Profile SET Owed='$o' WHERE Username='$UN'";
$result = $conn->query($sql);
echo "MONEY OWED : Rs ".$row["SUM(Money)"]."<br>";
$n=$l-$o;
echo "NET WORTH : Rs ".$n;
echo "</div></center>";
$conn->close();
?>
</center>
</body>
</html>