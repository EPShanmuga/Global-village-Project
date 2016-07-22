<?php
session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');
?>
<!DOCTYPE html>
<html>
<head>
<title>
VIEW PROFILES
</title>
</head>
<style>
body
{font-size:28px;font-family:sylfaen;
}
</style>
<body style="background-image:url(other.jpg);background-repeat: no-repeat;background-position:center;background-color:rgb:black;background-size:cover;background-color:rgb(230,102,255);font-family:sylfaen;font-size:30px;">
<form action="logout.php"><input type="submit" value="LOGOUT"></form>
<center>
  <h1 style="color:rgb(0, 128, 128);background-color:white;"> 
  <u> 
  VIEW OTHER PROFILES 
  </u>
  </h1>
  

  <form action="">
  
<select name="customers" onchange="showCustomer(this.value)" style="color:rgb(0, 128, 128);font-size:25px;width:30%;padding:5px;">
   
 <option value="">Select user:</option>
 
   <?php
      //getting options from database
 
//$a=$_GET["Username"]; 
    $conn = new mysqli("localhost","root","","Globville");
     
 $sql = "SELECT Username FROM Profile";
  
    $result = $conn->query($sql);
   
   if ($result->num_rows > 0)
      {
     
  while($row = $result->fetch_assoc()) 
       {
     
    $opt=$row["Username"];
         echo '<option value="'.$opt.'">'.$opt.'</option>';
        }
    
  }
      $conn->close();
    ?>
  
</select>
  
</form>
  
<br>
  
<div id="txtHint" style="color:rgb(0, 128, 128);background-color:rgba(255,255,255,0.7);width:60%;">Details will be shown here...</div>
  
<script>
  
//enabling ajax form submission
 
 function showCustomer(str) 
  {
    var xhttp;
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
   xhttp.open("GET", "view.php?q="+str, true);
    xhttp.send();
  }
  
</script>
  </center>
  </body>
</html>
