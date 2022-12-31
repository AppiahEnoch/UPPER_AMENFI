<?php
$dir = 'file';

// Create directory with read and write permissions for everyone
if (!is_dir($dir)) {
  mkdir($dir, 0777, true);
}

// Make every file in the directory writable
foreach (glob("$dir/*") as $file) {
  chmod($file, 0777);
}











folderExist($dir);
check_folder_permissions($dir);
check_file_permissions($dir);





function folderExist($dir) {
    if (file_exists($dir)) {
      echo "File or directory exists";
    } else {
      echo "File or directory does not exist";
    }
  }
  
  
  
  
  function check_folder_permissions($dir) {
    if (is_readable($dir) && is_writable($dir)) {
      echo "Directory is readable and writable";
    } else {
      echo "Directory is not readable and writable";
    }
  }
  
  
  
  function check_file_permissions($dir) {
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
  