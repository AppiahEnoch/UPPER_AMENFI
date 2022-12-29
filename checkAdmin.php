<?php
session_start();
if(!(isSessionSet("MOBILE"))){
    openPage("index.php");
    exit;
}

if(!(isSessionSet("ADMIN"))){
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
  