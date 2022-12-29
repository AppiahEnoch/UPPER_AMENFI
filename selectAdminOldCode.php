<?php
require_once "config.php";

$value="";

$password=$_POST["password"];
$mobile=$_POST["mobile"];







$sql = "SELECT * FROM sysadmin WHERE `password`=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $password);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['password'];
          echo 1;
          exit;
   
}

echo 0;
exit;










$stmt->close();
$conn->close();


?>