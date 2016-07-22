<?php
session_start();
if(!isset($_SESSION["UN"]))
header('Location:main.htm');
?><!DOCTYPE html>
<html>
<head>
<title>
MESSAGE
</title>
<style>
body
{
background-image:url(other.jpg);
background-repeat: no-repeat;
background-position:center;
background-color:rgb:black;
background-size:cover;
font-family:sylfaen;
font-size:25px;
color:black;
}
</style>
</head>
<body>
<?php 
$UN=$_SESSION["UN"];
$host="localhost";$db="Globville";$rt="root";$pswd="";
$conn = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
$sql = $dbh->prepare("INSERT INTO Message (Fromwho,Towho,Msg,Whentime)
VALUES (:d,:b,:c,NOW())");

$sql->bindParam(':d',$UN);
$sql->bindParam(':b',$_GET["to"]);
$sql->bindParam(':c',$_GET["msg"]);
$sql->execute();
//$b=$_GET["from"];
//echo $b;
//$a="send.php";
//$a=$a.$b;
//echo  $a;
if(!$conn->error) echo $conn->error;
echo "<br><br><br><center><form action='send.php'><input type='submit' value='SEND ANOTHER' style='font-size:30px;'>
</center>";
?>
</body>
</html>