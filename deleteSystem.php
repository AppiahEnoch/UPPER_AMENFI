<?php
require_once 'config.php';


$sql  =  "DELETE FROM sysuser";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql  =  "DELETE FROM `authentication`";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql  =  "DELETE FROM `emailverification`";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql  =  "DELETE FROM `employee`";
$stmt = $conn->prepare($sql);
$stmt->execute();

echo 1;