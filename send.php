<?php session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');?>
<!DOCTYPE html>
<html>
<style>
body
{
color:rgb(212,175,55);
font-size:30px;font-family:sylfaen;background-color:rgba(255,255,255,0.7);
}
</style>
<body style="font-size:30px;font-family:sylfaen;background-image:url(send.jpg);background-repeat: no-repeat;background-position:center;">
<form action="logout.php"><input type="submit" value="LOGOUT"></form>
<center>
<script>
//var q=window.location.href;  var pos = q.search("=");
//var w=q.slice(pos+1,q.length);
//document.getElementById("g").innerHTML=w;
//var e=window.location.href;  var pos = e.search("e=");
//var r=e.slice(pos+2,r.length);
function showHint(str) {
  if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "suggest.php?q=" + str, true);
xmlhttp.send();
    }
}
</script>
<h1 style="font-size:35px;font-family:sylfaen;"> SEND MESSAGE </h1>
<form action="write.php" method="get">
MESSAGE
<br>
<input type="text" id="msg" name="msg" placeholder="Message" style="background-color:rgb(197,179,88);color:rgb(0,51,102);font-size:25px;font-family:sylfaen;">
<br>
USERNAME
<br>
<input style="font-size:25px;font-family:sylfaen;background-color:rgb(197,179,88);color:rgb(0,51,102);" type="text" placeholder="Username" name="to" id="to" onchange="showHint(this.value)" onkeypress="showHint(this.value)" onpaste="showHint(this.value)" oninput="showHint(this.value)">
<br>
<br>
<input type="submit" value="SEND" style="background-color:rgb(197,179,88);color:rgb(0,51,102);font-size:25px;">
</form>
<p> SUGGESTIONS : <span id="txtHint"></span></p>
</body>
</html>