<?php
session_start();
if(!isset($_SESSION["UN"]))
header('Location:main.htm');
?>
<!DOCTYPE html><html><head><title>EXPENSES</title></head><style>
body
{font-size:30px;font-family:sylfaen;}
table
{box-shadow:5px 5px 3px #357EC7;}
h1
{font-size:40px;font-family:sylfaen;background-color:rgba(135,206,235,0.8);box-shadow:5px 5px 3px #357EC7;}
</style><body style="background-image:url(pending.jpg);background-repeat: no-repeat;background-position:center;background-color:rgb:black;background-size:cover;">
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
xmlhttp.open("GET", "pending.php", true);
xmlhttp.send();}see();
setInterval(function(){see();},1000);
</script>
</body>
</html>