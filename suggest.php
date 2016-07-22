<?php
// Array with names
$conn = new mysqli("localhost","root","","Globville");
$sql = "SELECT Username FROM Profile";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{$a[]=$row["Username"];
}}
$conn->close();

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
$try=substr($name,0,$len);
        if ($try==$q) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "No such user!" : $hint;
?>