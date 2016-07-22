<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
<title>
LOGIN PAGE
</title>
</head>
<style>
p
{
font-size:25px;
font-family:sylfaen;
}
</style>
</head>
<body style="background-image:url(login4.jpg);background-repeat: no-repeat;background-position:center;background-size:1500px 1000px;">
<center>
<br>
<br>
<form action="new.php" method="post" style="font-size:40px;font-family:sylfaen">
<br>
<fieldset style="background-color:rgb(25,25,25);box-shadow:5px 5px 3px #101010;width:400px;" >
<!--<legend style="font-size:50px;font-family:sylfaen;color:rgb(145,145,145);"><u><b> LOGIN </b></u></legend>-->
<center>
<span><h1 style="color:rgb(200,200,200);font-size:25px;font-family:sylfaen;font-size:35px;"><img src="lock.jpg" width="35" height="35"> USER-LOGIN</h1></span>
<input required type="text" style="background-color:rgb(15,15,15);color:rgb(200,200,200);font-size:25px;"id="Username"  name="Username" placeholder="Username" required>
<br>
<input required pattern="[A-Za-z0-9]*" type="password" id="Password" name="Password" style="background-color:rgb(15,15,15);color:rgb(200,200,200);font-size:25px;" placeholder="Password" required>
<br>
<br>
<input type="submit" name="Submit" pattern="[A-Za-z0-9]*" value="SUBMIT" style="background-color:rgb(15,15,15);color:rgb(200,200,200);font-size:25px;">
<br>
</fieldset>
</form>
</center>
</body>
</html>