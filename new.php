<?php
session_start();
// Create connection
$conn = new mysqli("localhost", "root", "", "Globville");
$_SESSION["UN"]=$_POST["Username"];
$_SESSION["PW"]=$_POST["Password"];
$UN=$_SESSION["UN"];
$PW=$_SESSION["PW"];
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
} 
$flag=0;
$sql = "SELECT Name,Email,Username,Password FROM Profile";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{
if($UN==$row["Username"])
{
$hashed  = hash('sha256', $PW.$UN);

if($hashed==$row["Password"])
{
$flag=1;
header('Location:display.php');
}}}}?>