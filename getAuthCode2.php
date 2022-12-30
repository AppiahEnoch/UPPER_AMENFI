<?php
require_once 'config.php';

$v1="mobile";
$v2="email";



// declare all fields
$mobile= cleanInput( $_POST[$v1]);
$email= cleanInput(   $_POST[$v2]);
$code= "";

$valExist=0;




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

  $sql = "SELECT * FROM userpassword WHERE mobile=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $mobile,);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
       $value= $row['mobile'];
     
      echo 1;
        exit;

     
      
     
  }


  $sql  =  "DELETE FROM sysuser WHERE mobile=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $mobile);
  $stmt->execute();



  $sql = "SELECT * FROM sysadmin WHERE mobile=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $mobile,);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
       $value= $row['username'];
     
       echo 2;

       exit;
     
  }









  


try{
  $code=generateOTP();

$stmt = $conn->prepare("INSERT INTO emailVerification (mobile, email, code) VALUES (?, ?,?)");
$stmt->bind_param("sss", $mobile, $email, $code);
 $stmt->execute();


$stmt->close();
$conn->close();
    
}
catch(Exception $e){


  

   
    
}

echo "$code";

  
function generateOTP() {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
  $otp = '';
  for ($i = 0; $i < 4; $i++) {
    $otp .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $otp;
}
