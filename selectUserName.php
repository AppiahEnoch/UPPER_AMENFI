<?php
require_once "config.php";

$value="";

$username=$_POST["username"];
$mobile=$_POST["mobile"];




$sql = "SELECT * FROM userpassword WHERE username=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $username,);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['username'];
   
     echo 1;
     exit;
   
}

$sql = "SELECT * FROM userpassword WHERE mobile=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $mobile);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['mobile'];
   
     echo 2;
     exit;
   
}


echo "";










$stmt->close();
$conn->close();


?>