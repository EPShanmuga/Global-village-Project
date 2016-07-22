<?php
$conn=new mysqli("localhost","root");
if($conn->connect_error)die("Found problem : ".$conn->connect_error);
$sql="CREATE DATABASE GLOBVILLE";
if ($conn->query($sql) === TRUE) {
echo "Database created successfully";
} else {
echo "Found Problem : " . $conn->error;
}
$conn->close();
?> 