<?php
require_once "config.php";

$email="";

$password="";
$username="";
$realName="";
$mobile=$_POST["mobile"];

$loc=0;


$sql = "SELECT * FROM sysadmin WHERE mobile=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $mobile);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $email= $row['email'];
     $password= $row['password'];
     $username= $row['username'];
     $realName="SYSTEM ADMINISTRATOR";

   $loc=1;
  
  
   
}

$sql = "SELECT * FROM sysuser WHERE mobile=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $mobile);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $email= $row['email'];
     $f=$row["fname"];
     $m=$row["mname"];
     $l=$row["lname"];
     $realName=$f." ".$m." ".$l;

   $loc=2;
     
   
   
}


if($loc==0){
     echo 0;
     exit;
}



if($loc==2){

     $sql = "SELECT * FROM userpassword WHERE mobile=?";
     $stmt = $conn->prepare($sql); 
     $stmt->bind_param("s", $mobile);
     $stmt->execute();
     $result = $stmt->get_result();
     if ($row = $result->fetch_assoc()) {
          $password= $row['password'];
          $username= $row['username'];
     
        
     }


}




echo "$username|$password|$email|$realName";







$stmt->close();
$conn->close();


?>