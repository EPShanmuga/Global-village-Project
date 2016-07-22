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

<style>
body
{background-image:url(gadd.jpg);
background-repeat: no-repeat;
background-position:center;
background-color:rgb:black;
background-size:cover;
color:white;
font-size:30px;
font-family:sylfaen;
}
</style>
</head>

<body style="background-color:black;font-family:sylfaen;font-size:30px;">
<center>
  
<h1> 
  
<u> 
  
ADD PROFILES 
  
</u>
  
</h1>
  

<form action="">
  
<select name="customers" onchange="showCustomer(this.value)" style="background-color:rgb(21, 105, 199);color:black;font-size:25px;">
   
<option value="">Select user:</option>
 
 <?php
      //getting options from database
  $UN=$_SESSION["UN"];
$host="localhost";$db="Globville";$rt="root";$pswd="";
$conn = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
$sql = $dbh->prepare("INSERT INTO Groups (Name,People)
VALUES (:a,:b)");
$sql->bindParam(':a',$_POST["Gname"]);
$sql->bindParam(':b',$UN);
$sql->execute();
$link="group.php?Username=";
$use=$UN;
$link=$link.$use;
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
  
<div id="txtHint">Details will be shown here...</div>
  
<script>
  
//enabling ajax form submission
 
 function showCustomer(str) 
  
{
  var h='<?php echo $_POST["gname"];?>';

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
   //document.write("comes here");
xhttp.open("GET", "groupform1.php?q="+str+"&w="+h, true);
    
xhttp.send();

}
  
</script>
<br>
  
<form action="<?php echo $link;?>"><input type="submit" value="DONE" style="background-color:rgb(21, 105, 199);color:black;font-size:25px;"></form>
</center>
  
</body>

</html>
