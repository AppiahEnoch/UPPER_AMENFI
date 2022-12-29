<?php
require_once "config.php";

$value="";

$code=$_POST["code"];




$sql = "SELECT * FROM `authentication` WHERE `code`=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
     $value= $row['code'];
          echo 1;
          exit;
   
}

echo 0;
exit;










$stmt->close();
$conn->close();


?>