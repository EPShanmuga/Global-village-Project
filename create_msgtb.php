<?php 
$conn=new mysqli("localhost","root","","Globville");
$sql="CREATE TABLE Message(
Fromwho varchar(10) NOT NULL,
Towho varchar(10) NOT NULL,
Msg varchar(300) NOT NULL,
Whentime datetime,
UNIQUE(Fromwho,Towho,Msg,Whentime)
)";
if($conn->query($sql)===TRUE)
echo "Table created successfully";
else
echo "Problem Found :".$conn->error;
?>