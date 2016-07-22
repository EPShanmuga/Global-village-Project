<?php
session_start();
if(!isset($_SESSION["UN"]))
header('Location:main.htm');

//$UN=$_SESSION["UN"];
$gender=$_GET["gender"];
$Fromwho=$_GET["Fromwho"];
$Whentime=$_GET["Whentime"];
$Towho=$_GET["Towho"];
if($gender=="YES"){$conn = new mysqli("localhost", "root", "","Globville");
$sql = "UPDATE Finance SET Reason='$gender' WHERE Towho='$Towho' AND Fromwho='$Fromwho' AND Whentime='$Whentime'";
$result = $conn->query($sql);


$conn->close();}
if($gender=="NO"){echo "NO";$conn = new mysqli("localhost", "root", "","Globville");
$sql = "DELETE FROM Finance WHERE Towho='$Towho' AND Fromwho='$Fromwho' AND Whentime='$Whentime'";
$result = $conn->query($sql);


$conn->close();}
header('Location:load.php');

?>