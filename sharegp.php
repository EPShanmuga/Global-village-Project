<?php session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');?>
<!DOCTYPE html>

<html>

<head>

<title>
WITH GROUP
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
</style>
</head>

<body>
<form action="logout.php"><input type="submit" value="LOGOUT"></form>
<center>
  
<h1> 
  <u> 
  EXPENSE OF THE GROUP 
  </u>
  </h1>
  


<fieldset style="background-color:rgba(255,255,0,0.3);width:300px;">  <form action="gpshared.php" method="post">
 
<input type="number" name="money" style="background-color:rgba(255,255,0,0.4);font-size:25px;"> <br>
<select name="customers" onchange="showCustomer(this.value)" style="background-color:rgba(255,255,0,0.4);font-size:25px;">
   
 <option value="">Select user:</option>
 
   <?php
      //getting options from database
  $UN=$_SESSION["UN"];
   //$a=$_GET["Username"]; 
    $conn = new mysqli("localhost","root","","Globville");
     
 $sql = "SELECT Name FROM Groups WHERE People='".$UN."'";
  
    $result = $conn->query($sql);
   
   if ($result->num_rows > 0)
      {
     
  while($row = $result->fetch_assoc()) 
       {
     
    $opt=$row["Name"];
         echo '<option value="'.$opt.'">'.$opt.'</option>';
        }
    
  }
      $conn->close();
   ?>
  
</select>
<br>
<input type="submit" value="submit"  style="background-color:rgba(255,255,0,0.4);font-size:25px;">
</form>
  <br>
 
</body>
</html>