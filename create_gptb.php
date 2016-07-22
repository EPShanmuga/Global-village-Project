<?php 
$conn=new mysqli("localhost","root","","Globville");
$sql="CREATE TABLE Groups(
Name varchar(20) NOT NULL,
People varchar(10) NOT NULL,
PRIMARY KEY(Name,People))";
if($conn->query($sql)===TRUE)
echo "Table created successfully";
else
echo "Problem Found :".$conn->error;
?>