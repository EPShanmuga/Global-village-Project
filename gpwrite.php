 <?php
      //getting options from database
 session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');
 $q=$_GET["q"];
$w=$_SESSION["UN"];

$msg=$_GET["msg"];
    $conn = new mysqli("localhost","root","","Globville");
    
 $sql = "SELECT People FROM Groups WHERE Name='".$q."'";
  
    $result = $conn->query($sql);
   
   if ($result->num_rows > 0)
      
{
     
  while($row = $result->fetch_assoc()) 
       
{
     if($w!=$row["People"])
{
$host="localhost";$db="Globville";$rt="root";$pswd="";
 $conn2 = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
$sql2 = $dbh->prepare("INSERT INTO Message (Fromwho,Towho,Msg,Whentime)
VALUES (:d,:b,:c,NOW())");
$sql2->bindParam(':d',$q);
$sql2->bindParam(':b',$row["People"]);
$sql2->bindParam(':c',$msg);
$sql2->execute();

}
else if($w==$row["People"])
{
$host="localhost";$db="Globville";$rt="root";$pswd="";
 $conn2 = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
$sql2 = $dbh->prepare("INSERT INTO Message (Fromwho,Towho,Msg,Whentime)
VALUES (:d,:b,:c,NOW())");
$sql2->bindParam(':b',$q);
$sql2->bindParam(':d',$row["People"]);
$sql2->bindParam(':c',$msg);
$sql2->execute();

}


 }

}     
 if($conn2->error)echo $conn2->error; else echo "SENT!";$conn2->close(); ?>
  