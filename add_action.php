<!DOCTYPE html>
<html>
<head>
<title>
ADD USER RESULT
</title>
</head>
<body style="background-color:rgb(255,51,102);">
<center>
<p style="font-size:40px;font-family:sylfaen;">
<?php

$hash = hash('sha256', $_POST["Password"].$_POST["Username"]);

// Create connection
$host="localhost";$db="Globville";$rt="root";$pswd="";
$conn = new mysqli($host, $rt,$pswd,$db);
$dbh=new PDO("mysql:host=$host;dbname=$db", $rt, $pswd);
$sql = $dbh->prepare("INSERT INTO Profile (Name,Email,Username,Password)
VALUES (:a,:c,:d,:e)");
$sql->bindParam(':a',$_POST["Name"]);
$sql->bindParam(':c',$_POST["Email"]);
$sql->bindParam(':d',$_POST["Username"]);
$sql->bindParam(':e',$hash);

$sql->execute();
echo "You have registered successfully!";
$uploadOk = 1;
//Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {echo "coming";
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       echo $check["mime"];
        $uploadOk = 1;
    }
}
$addr="C:\\xampp\\htdocs\\Global village\\";
$addr=$addr.$_POST["Username"];
$addr=$addr.".jpg";
move_uploaded_file($_FILES["UploadPhoto"]["tmp_name"],$addr);
echo "Please login now";
$conn->close();
?>
</p>
<br>
<form action="login2.php" id="form1"></form>
<button class="button" form="form1" style="background-color:black;font-size:35px;color:rgb(255,51,102);padding:20px 20px;font-family:sylfaen;"> LOGIN </button>
<br>
</body>
</html>