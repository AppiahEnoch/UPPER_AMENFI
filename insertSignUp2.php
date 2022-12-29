<?php
require_once 'config.php';

$v1="fname";
$v2="mname";
$v3="lname";
$v4="code";


// declare all fields
$fname= cleanInput( $_POST[$v1]);
$mname= cleanInput(   $_POST[$v2]);
$lname= cleanInput( $_POST[$v3]);
$code= cleanInput( $_POST[$v4]);
$mobile="";




// array to test post and set status of vital variables
$arrayOfAllNames=[$v1,$v2,$v3,$v4];

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
  $_SESSION["REG2"]="reg";








try{

  $sql = "UPDATE sysuser SET fname=?, mname=?,lname=? WHERE mobile=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("ssss", $fname,$mname,$lname,$mobile);
  $stmt->execute();

$n=1;
  $sql = "UPDATE verified SET vcode=? WHERE mobile=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("ss", $n,$mobile);
  $stmt->execute();




  $sql  =  "DELETE FROM `authentication` WHERE code=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $code);
  $stmt->execute();





 echo 1;
$stmt->close();
$conn->close();
    
}
catch(Exception $e){


  

   
    
}



  
  