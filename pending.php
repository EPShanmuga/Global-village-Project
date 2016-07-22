<?php
session_start();
if(!isset($_SESSION["UN"]))
header('Location:main.htm');?>
<!DOCTYPE html><html><head><title>EXPENSES</title></head><style>
body
{font-size:30px;font-family:sylfaen;}
table
{box-shadow:5px 5px 3px #357EC7;}

h1
{font-size:40px;font-family:sylfaen;background-color:rgba(135,206,235,0.8);box-shadow:5px 5px 3px #357EC7;}
</style><body style="background-image:url(pending.jpg);background-repeat: no-repeat;background-position:center;background-color:rgb:black;background-size:cover;">
<?php
$conn = new mysqli("localhost", "root", "","Globville");
$UN=$_SESSION["UN"];
echo "<center><h1>LENT</h1>";
// Check connection
$sql = "SELECT Fromwho,Towho,Money,Whentime FROM Finance WHERE Fromwho='$UN' AND Reason='YES'";
$result = $conn->query($sql);
$var=1;
if ($result->num_rows > 0)
 {echo "<br><table style='width:50%;border:1px solid black;border-collapse: collapse;background-color:rgba(135,206,235,0.8);'><th style='padding: 15px;border:1px solid black;text-align:left;border-collapse: collapse;'>Spent For</th><th style='border-collapse: collapse;padding: 15px;border:1px solid black;text-align:left;'>Amount</th><th style='text-align:left;border:1px solid black;padding: 15px;'>Time</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
//echo "<br>".$var."<br>";

echo "<tr style='padding: 15px;border:1px solid black;border-collapse: collapse;'><td style='border:1px solid black;padding: 15px;border-collapse: collapse;'>".$row["Towho"]."</td>";

echo "<td style='padding: 15px;border:1px solid black;border-collapse: collapse;'>".$row["Money"]."</td>";
echo "<td style='padding: 15px;border:1px solid black;border-collapse: collapse;'>".$row["Whentime"]."</td></tr>";
$var++;
}echo "</table>";}
else 
echo "No results";
echo "<br>";
// Check connection
echo "<h1>OWED</h1>";
$sql = "SELECT Fromwho,Towho,Money,Whentime FROM Finance WHERE Towho='$UN' AND Reason='YES'";
$result = $conn->query($sql);
$var=1;
if ($result->num_rows > 0)
 {echo "<br><table style='width:50%;border:1px solid black;border-collapse: collapse;background-color:rgba(135,206,235,0.8);'><th style='padding: 15px;border:1px solid black;border-collapse: collapse;text-align:left;'>Spent By</th><th style='border:1px solid black;border-collapse: collapse;text-align:left;padding: 15px;'>Amount</th><th style='border:1px solid black;border-collapse: collapse;text-align:left;padding: 15px;'>Time</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
//echo "<br>".$var."<br>";

//echo "<b>"." Spent for : "."</b>" . $row["Towho"]."<br>";
echo "<tr style='border:1px solid black;border-collapse: collapse;'><td style='padding: 15px;border:1px solid black;border-collapse: collapse;'>".$row["Fromwho"]."</td>";
//echo "<b>"." Email Address: "."</b>".$row["Email"]."<br>";
echo "<td style='border:1px solid black;padding: 15px;border-collapse: collapse;'>".$row["Money"]."</td>";
echo "<td style='border:1px solid black;padding: 15px;border-collapse: collapse;'>".$row["Whentime"]."</td></tr>";
$var++;
}echo "</table></center>";}
else 
echo "No results";
if($conn->error)echo $conn->error;

$conn->close();
?>
</body>
</html>