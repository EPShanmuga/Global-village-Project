<?php session_start();?><!DOCTYPE html>
<html>
<head>
<title>
USER PAGE
</title>
</head>
<style>
p
{width:700px;
background-color:rgb(255,207,64);
color:rgb(166,124,0);
font-size:45px;
font-family:sylfaen;
}
img
{
padding:10 px 10px;
border:2px solid black;
}
input
{width:270px;height:30px;border:1px solid black;
background-color:rgb(207,181,59);color:rgb(133,85,11);font-size:21px;}
</style>
<body style="background-image:url(profile.jpg);background-repeat: no-repeat;background-position:center;background-size:1500px 1500px;font-size:30px;font-family:sylfaen;">
<center>
<?php
//session_start();
// Create connection
$conn = new mysqli("localhost", "root", "", "Globville");
//$_SESSION["UN"]=$_POST["Username"];
//$_SESSION["PW"]=$_POST["Password"];
$UN=$_SESSION["UN"];
$PW=$_SESSION["PW"];
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
} 
$flag=0;
$sql = "SELECT Name,Email,Username,Password FROM Profile";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{
if($UN==$row["Username"])
{
$hashed  = hash('sha256', $PW.$UN);

if($hashed==$row["Password"])
{
$flag=1;
break;
}
}
}
if($flag)
{echo "<form action='logout.php'><input type='submit' value='LOGOUT'></form>";
$qq=$UN;
if(isset($_COOKIE[$qq]))
echo "LAST LOGIN:".$_COOKIE[$qq];
$cookie_name = $UN;
$t=time();
$cookie_value = date("Y-m-d",$t);
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	echo"<fieldset style='background-color:rgba(255,255,255,0.5);width:800px;'><br><p> <u>PROFILE PAGE</u></p>";

echo "<b>"." Name: "."</b>" . $row["Name"]."<br>";
echo "<b>"." Email Address: "."</b>".$row["Email"]."<br>";
echo "<b>"." Username: "."</b>".$row["Username"]."<br>";
echo "<b>"."Profile Picture : "."</b><br>";
$addr=$UN;
$addr=$addr.".jpg";
$u=$UN;
echo "<img src='$addr' width=150 height=150;>";
echo "<form action='load.php' ><input type='submit'  value='NOTIFICATIONS'></form>";
echo "<form action='share1.php' method='get'><input type='submit'  value='SHARE EXPENSES'></form>";
echo "<form action='load1.php' method='get'><input type='submit' value='PENDING'></form>";
echo "<form action='load5.php' method='get'><input type='submit'  value='FINANCE'></form>";
//echo "<form action='edit.php' method='get' ><input type='submit'  value='EDIT PROFILE'></form>";
echo "<form action='other.php' ><input type='submit' value='VIEW OTHER PROFILES'></form>";
echo "<form action='send.php' ><input type='submit'  value='SEND MESSAGE'></form>";
echo "<form action='load4.php' ><input type='submit'  value='VIEW MESSAGE'></form>";
echo "<form action='group.php' ><input type='submit'  value='CREATE GROUP'></form>";
echo "<form action='sharegp.php' ><input type='submit'  value='SHARE WITH GROUP'></form>";

echo "<form action='gpmsg.php' method='get'><input type='submit'  value='GROUP MESSAGE'></form></fieldset>";
}
if(!$flag) header('Location: login.htm');;
}
else
echo "no result!";
$conn->close();
?>
</center>
</body>
</html>