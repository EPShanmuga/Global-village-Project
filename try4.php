<?php session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');
$a=explode(",",$_GET["q"]);
$d=sizeof($a);
//$f=$_GET["w"];
$UN=$_SESSION["UN"];
$d-=2;
//echo '<input type="text" id="reason">';
//$r='<script>var a=document.getElementById("reason");document.write(a);</script>';
//echo $r;
$host="localhost";$db="Globville";$rt="root";$pswd="";
$conn = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
for($i=0;$i<=$d;$i++){
$sql = $dbh->prepare("INSERT INTO Finance (Fromwho,Towho,Money,Whentime)
VALUES (:d,:b,:c,NOW())");
$sql->bindParam(':d',$UN);
$sql->bindParam(':b',$a[$i]);
$sql->bindParam(':c',$a[++$i]);
$sql->execute();
if(!$conn->error)echo "yes";
}
?>