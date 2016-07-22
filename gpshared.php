<?php session_start();
if(!isset($_SESSION["UN"]))
header('Location:main.htm');?>
<!DOCTYPE html>
<html>
<head><title>
GROUP SHARE
</title>
<style>
body
{
background-image:url(sharegp.jpg);
background-repeat: no-repeat;
background-position:center;
background-color:rgb:black;
background-size:cover;
font-family:sylfaen;
font-size:30px;
color:black;
}
</style></head>
<body>
 <?php
      //getting options from database
 
 $a=$_POST["customers"];
$b=$_POST["money"];
$UN=$_SESSION["UN"];
    $conn = new mysqli("localhost","root","","Globville");
    
$sql1="SELECT COUNT(*) FROM Groups WHERE Name='".$a."'"; 
$result1 = $conn->query($sql1);
 
$row1 = $result1->fetch_assoc();
$num =$row1["COUNT(*)"];
$split=$_POST["money"]/$num;
 $sql = "SELECT People FROM Groups WHERE Name='".$a."'";
  
    $result = $conn->query($sql);
   
   if ($result->num_rows > 0)
      
{
     
  while($row = $result->fetch_assoc()) 
       
{
     if($UN!=$row["People"])
{
$host="localhost";$db="Globville";$rt="root";$pswd="";
 $conn2 = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
$sql2 = $dbh->prepare("INSERT INTO Finance (Fromwho,Towho,Money,Whentime)
VALUES (:d,:b,:c,NOW())");
$sql2->bindParam(':d',$UN);
$sql2->bindParam(':b',$row["People"]);
$sql2->bindParam(':c',$split);
$sql2->execute();
$link="sharegp.php?Username=".$UN;
}
 }

}    if($conn->error)echo $conn->error;  $conn->close();
if($conn2->error)echo $conn2->error;
    ?>
 
<br>
<br>
<center>
<form action="<?php echo $link;?>">
<input type="submit" value="SHARE MORE"  style="background-color:rgba(255,255,0,0.4);font-size:45px;padding:10px 10px;"></form> 
</center></body>
</html>