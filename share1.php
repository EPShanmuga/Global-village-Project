<?php session_start();if(!isset($_SESSION["UN"]))
header('Location:main.htm');?><!DOCTYPE html>
<html>
<head>
<title>
LOGIN PAGE
</title>
</head>
<style>
h
{
background-color:black;
color:rgb(0,153,255);
font-family-algerian;
font-size:50px;
}
p
{
font-size:25px;
font-family:sylfaen;
}
button
{width:200px;height:35px;border:2px solid black;background-color:black;color:rgb(120, 24, 74);font-family:sylfaen;font-size:26px;
}
</style>

<script>
//var q=window.location.href;  var pos = q.search("=");
//var w=q.slice(pos+1,q.length);


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
</head>
<body style="background-color:rgb(204,51,155);background-image:url(share.jpg);background-repeat: no-repeat;background-position:center;background-size:1500px 1500px;">
<br><center>
<form action="logout.php"><input type="submit" value="LOGOUT"></form>
<fieldset style="background-color:rgba(255, 255, 255,0.3);width:800px;">
<!--<form style="font-size:40px;font-family:sylfaen">
REASON
<input type="text" style="background-color:black;color:rgb(163,0,163);font-size:25px;" required name="Reason" id="Reason">
</form>--><br><h1> YOU SPENT MONEY FOR</h1>
<form style="font-size:40px;font-family:sylfaen" action="share_action.php" method="post">

<input type="text" required style="background-color:black;color:rgb(163,0,163);font-size:25px;" placeholder="Username" name="Names" id="Names" onchange="showHint(this.value)" onkeypress="showHint(this.value)" onpaste="showHint(this.value)" oninput="showHint(this.value)">
<br><input required type="number" style="background-color:black;color:rgb(163,0,163);font-size:25px;" placeholder="Money" name="Moneys" id="Moneys">
</form><br>
<button onclick="getit()" >ADD DETAIL</button>
<button onclick="see()" >SHARE NOW</button>
<p id="f"></p>
<p id="e"></p>
<p style="color:black;">SUGGESTIONS: <span id="txtHint"></span></p>
    <script>
var list1=[];
var list2=[];
var text = "";var type="";
      function getit()
{
      text="";type="";
  var xhttp;
        var input1=document.getElementById("Names").value;
	 var input2=document.getElementById("Moneys").value;
	
        xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() 
{
if (xhttp.readyState == 4 && xhttp.status == 200) 
{
list1.push(input1);
list2.push(input2);

var i;
for (i = 0; i < list1.length; i++) {
    text += list1[i] + ","+list2[i]+",";
type+=list1[i] + "  - "+list2[i]+"<br>";}

document.getElementById("f").innerHTML=type;
document.getElementById("Names").value="";
document.getElementById("Moneys").value="";
}
};
        xhttp.open("GET", "empty.txt", true);
        xhttp.send();
}
function see()
{ 
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("Hint").innerHTML = xmlhttp.responseText;
for(i=0;i<list1.length;i++)
{list1.pop();list2.pop();}list1.pop();list2.pop();document.getElementById("Names").value="";text="";type="";
document.getElementById("Moneys").value="";document.getElementById("f").innerHTML="";
            }
        };
xmlhttp.open("GET", "try4.php?q="+text, true);
xmlhttp.send();}

</script>
<div id="Hint"></div>
</fieldset>
</body>
</html>