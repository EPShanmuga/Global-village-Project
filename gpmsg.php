<?php session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');
?><!DOCTYPE html>

<html>

<head>

<title>
VIEW PROFILES
</title>

<style>
body
{
background-image:url(gpmsg.jpg);
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
<form action="logout.php"><input type="submit" value="LOGOUT"></form>;
<center>
  <h1> 
  <u> 
  VIEW OTHER PROFILES 
  </u>
  </h1>
 
<fieldset style="background-color:rgba(255,255,255,0.3);width:500px;"> 

  <form action="">PLEASE TYPE THE MESSAGE IN THE GIVEN BOX FIRST
 :
<br>
<input type="text" name="msg" id="msg" style="font-size:20px;"> 
<br>
<select name="customers" onchange="showCustomer(this.value)" style="font-size:20px;">
   
 <option value="">GROUPS:</option>
 
   <?php
      //getting options from database
 
$UN=$_SESSION["UN"];
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
  
</form>
  
<br>
  
 
<div id="txtHint"></div>
 
<script>
  
//enabling ajax form submission
 
 function showCustomer(str) 
  {
 //var w='<php echo $UN;?>';//  document.getElementById("new").innerHTML=w;
var msg=document.getElementById("msg").value; var xhttp;
    if (str == "") 
  
  {

     document.getElementById("txtHint").innerHTML = "";
      return;
    }
  
  xhttp = new XMLHttpRequest();
   
 xhttp.onreadystatechange = function() 
    {
   
   if (xhttp.readyState == 4 && xhttp.status == 200) 
   
   {
    
    document.getElementById("txtHint").innerHTML = xhttp.responseText;
    
  }
    };
   xhttp.open("GET", "gpwrite.php?q="+str+"&msg="+msg, true);
    xhttp.send();

  }
  
</script>
  </center>
  </body>
</html>
