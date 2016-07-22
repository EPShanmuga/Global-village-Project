
<?php
session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');
?>
<!DOCTYPE html>
<html>
<head>
<title>
VIEW MESSAGE
</title>
</head>
<style>
h1{font-size:30px;}
body
{
background-image:url(select3.jpg);
background-repeat: no-repeat;
background-position:center;
background-color:rgb:black;
background-size:cover;
font-size:25px;
font-family:sylfaen;
}
table
{box-shadow:5px 5px 3px #888888;    border: 1px solid gray;
    border-collapse: collapse;}
td.td1
{
padding:10px 10px;font-size:15px;background-color:rgb(40,40,40);color:white;border: 1px solid gray;
    border-collapse: collapse;
}
td.td2
{
padding:30px 30px;font-size:15px;color:rgb(40,40,40);background-color:white;border: 1px solid gray;
    border-collapse: collapse;
}
</style>
<body>

<center>
<br>
<?php
// Create connection
$conn = new mysqli("localhost", "root", "","Globville");
$UN=$_SESSION["UN"];
// Check connection
$sql = "SELECT Fromwho,Towho,Msg,Whentime FROM Message WHERE Fromwho='$UN'";
$result = $conn->query($sql);
$var=1;echo "<h1>SENT MESSAGES</h1><br>";
if ($result->num_rows > 0)
 {echo "<table>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

$i=$row["Towho"].".jpg";
echo "<tr><td class='td1'><img src='".$i."' alt='GROUP' width='50' height='50'><br><center>".$row["Towho"]."</center></td>";
echo "<td class='td2'>".$row["Msg"]."</td>";
echo "<td class='td2'>".$row["Whentime"]."</td></tr>";
$var++;
}echo "</table>";}
else 
echo "No results";
echo "<hr>";
// Check connection
$sql = "SELECT Fromwho,Towho,Msg,Whentime FROM Message WHERE Towho='$UN'";
$result = $conn->query($sql);
$var=1;echo "<h1>RECEIVED MESSAGES</h1>";
if ($result->num_rows > 0)
 {echo "<table>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
$i=$row["Fromwho"].".jpg";
echo "<tr><td class='td1'><img src='".$i."' width='50' height='50'><br><center>".$row["Fromwho"]."</center></td>";
echo "<td class='td2'>".$row["Msg"]."</td>";
echo "<td class='td2'>".$row["Whentime"]."</td></tr>";


}echo "</table>";}
else 
echo "No recent messages";
if($conn->error)echo $conn->error;
$conn->close();
?>
</center>
</body>
</html>