<?php

session_start();
if(!(isSessionSet("REG1"))){
    openPage("index.php");
    exit; 
}







function isSessionSet($session_name) {
  if (isset($_SESSION[$session_name])) {
    return true;
  } else {
    return false;
  }
}


function openPage($url) {
    header('Location: ' . $url);
    exit;
  }
  