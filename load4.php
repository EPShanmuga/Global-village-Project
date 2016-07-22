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
xmlhttp.open("GET", "select3.php", true);
xmlhttp.send();}see();
setInterval(function(){see();},1000);
</script></center>
</body>
</html>