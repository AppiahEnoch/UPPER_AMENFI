<?php
$dir = 'file';


folderExist($dir);
check_folder_permissions($dir);
check_file_permissions($dir);





function folderExist($dir) {
    echo "<br>";
    if (file_exists($dir)) {
      echo "File or directory exists<br>";
    } else {
      echo "File or directory does not exist <br>";
    }
  }
  
  
  
  
  function check_folder_permissions($dir) {
    echo "<br>";
    if (is_readable($dir) && is_writable($dir)) {
      echo "Directory is readable and writable";
    } else {
      echo "Directory is not readable and writable";
    }
  }
  
  
  
  function check_file_permissions($dir) {
    echo "<br>";
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != "." && $file != "..") {
            $filepath = $dir . '/' . $file;
            if (is_writable($filepath)) {
              echo "$file is writable<br>";
            } else {
              echo "$file is not writable<br>";
            }
          }
        }
        closedir($dh);
      }
    }
  }
  