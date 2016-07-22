<?php
session_start();
if(!isset($_SESSION["UN"]))
header('Location:main.htm'); 

$UN=$_SESSION["UN"];

$conn = new mysqli("localhost", "root", "","Globville");
$UN=$_SESSION["UN"];
$sql = "SELECT Fromwho,Towho,Money,Whentime FROM Finance WHERE Towho='$UN' AND Reason!='YES'";
$result = $conn->query($sql);
$var=1;
if ($result->num_rows > 0)
 {$yes="Yes";$no="No";
    while($row = $result->fetch_assoc()) {$Fromwho=$row["Fromwho"];$Towho=$row["Towho"];$Money=$row["Money"];$Whentime=$row["Whentime"];
//echo "<tr style='border:1px solid black;border-collapse: collapse;'><td style='padding: 15px;border:1px solid black;border-collapse: collapse;'.$row["Fromwho"]."<<td>";
echo "<form action='act.php' method='get'>
<input type='text' value='".$Fromwho."' readonly name='Fromwho' id='Fromwho' >
<input type='hidden' value='".$Towho."' readonly name='Towho' id='Fromwho' >
<input type='text' value='".$Money."' readonly name='Money' id='Money'>
<input type='text' value='".$Whentime."' readonly name='Whentime' id='Whentime'>
<input type='radio' name='gender' id='gender' value='YES' onclick='javascript:submit()'>YES
<input type='radio' name='gender' id='gender' value='NO' onclick='javascript:submit()''>NO

</form>";
}echo "</center>";}
else 
echo "No results";
if($conn->error)echo $conn->error;

$conn->close();
?>
