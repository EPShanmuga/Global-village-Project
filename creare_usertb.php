<?php 
$conn=new mysqli("localhost","root","","Globville");
$sql="CREATE TABLE Profile(
Name varchar(30) NOT NULL,
Username varchar(10) PRIMARY KEY,
Owed decimal(10,2),
Lent decimal(10,2),
Email varchar(20) UNIQUE NOT NULL,
Password varchar(70) NOT NULL)";
if($conn->query($sql)===TRUE)
echo "Table created successfully";
else
echo "Problem Found :".$conn->error;
?>