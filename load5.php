<?php session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');?><!DOCTYPE html>
<html>
<head>
<title>
FINANCE
</title>
</head>
<style>

h1
{
box-shadow:5px 5px 3px #357EC7;font-size:45px;font-family:sylfaen;background-color:rgba(59, 185, 255,0.8);width:50%;padding:40px;
}
</style>
<body style="background-image:url(finance.jpg);background-repeat: no-repeat;background-position:center;background-size:cover;"><center>
<form action="logout.php"><input type="submit" value="LOGOUT"></form>
<div id="Hint"></div>
<script>
function see()
{var xmlhttp = new XMLHttpRequest();var rem;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	if(document.getElementById("Hint").innerHTML!=xmlhttp.responseText)
                {document.getElementById("Hint").innerHTML = xmlhttp.responseText;}

            }
        };
xmlhttp.open("GET", "fin.php", true);
xmlhttp.send();}see();
setInterval(function(){see();},1000);
</script></center>
</body>
</html>