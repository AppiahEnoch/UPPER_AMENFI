<?php


if (session_status() == PHP_SESSION_ACTIVE) {

  if (isset($_SESSION['REG1'])) {
     
  } else {
    openPage("index.php");
    exit;
     
  }
} else {
 session_start();
}



function openPage($url) {
    header('Location: ' . $url);
    exit;
  }
  