<?php 
$conn=new mysqli("localhost","root","","Globville");
$sql="CREATE TABLE Finance(
Fromwho varchar(10) NOT NULL,
Towho varchar(10) NOT NULL,
Money decimal(10,2) NOT NULL,
Reason varchar(30) NOT NULL,
Whentime datetime,
UNIQUE(Towho,Fromwho,Money,Reason,Whentime)
)";
if($conn->query($sql)===TRUE)
echo "Table created successfully";
else
echo "Problem Found :".$conn->error;
?>