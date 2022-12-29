<?php
require_once 'config.php';

$v1="username";
$v2="password";


// declare all fields
$username= cleanInput( $_POST[$v1]);
$password= cleanInput(   $_POST[$v2]);

$mobile="";





// array to test post and set status of vital variables
$arrayOfAllNames=[$v1,$v2];

// function to clean user input
function cleanInput($data){
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      } catch(Exception $e) {

      
        
      }
     return $data;
}





// functin to test issetand post variables
function inputsAreCorrect( $arrayOfAllNames) {
    $r=sizeof($arrayOfAllNames)-1;

    
    for ($i = 0; $i <= $r; $i++) {
        $fieldName=$arrayOfAllNames[$i];
     
        try{
            
            
        if (isset($_POST[$fieldName])) {

            if (empty($_POST[$fieldName])) {

                echo  $fieldName;
              
                return false;
                
            }
            
        }
        else{
            
        
            return false;
        } 
        } 
        catch(Exception $e){

            
        }
       
        
      
      }
    
    return true;
  }
  // check to insert data if everything is fine.
  if(!inputsAreCorrect($arrayOfAllNames)){
    exit();
  }

  session_start();
 
  $mobile= $_SESSION["MOBILE"];


  $sql  =  "DELETE FROM userpassword WHERE mobile=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $mobile);
  $stmt->execute();


try{

  $stmt = $conn->prepare("INSERT INTO userpassword (mobile, username,  `password`) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $mobile, $username, $password);
   $stmt->execute();

 echo 1;
$stmt->close();
$conn->close();
    
}
catch(Exception $e){


  

   
    
}



  
  