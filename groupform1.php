<?php
session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');
$UN=$_SESSION["UN"];
$host="localhost";$db="Globville";$rt="root";$pswd="";
$conn = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
$sql = $dbh->prepare("INSERT INTO Groups (Name,People)
VALUES (:a,:b)");
$sql->bindParam(':a',$_GET["w"]);
$sql->bindParam(':b',$_GET["q"]);
$sql->execute();
$sql = $dbh->prepare("INSERT INTO Groups (Name,People)
VALUES (:a,:b)");
$sql->bindParam(':a',$_GET["w"]);
$sql->bindParam(':b',$UN);
$sql->execute();
$g=$_GET["w"];
$conn = new mysqli("localhost", "root", "","Globville");
// Check connection
$sql = "SELECT People FROM Groups WHERE Name='".$g."'";
$result = $conn->query($sql);
$var=1;
if ($result->num_rows > 0)
 // output data of each row
    while($row = $result->fetch_assoc()) {
echo $row["People"]."<br>";
$var++;}
 else 
    echo "No results";
if($conn->error)echo $conn->error;
$conn->close();
?>