<?php
require_once 'config.php';



$v2="mobile";





// declare all fields
$code="";
$mobile= cleanInput(   $_POST[$v2]);








// array to test post and set status of vital variables
$arrayOfAlvoters=[$v2];

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
function inputsAreCorrect( $arrayOfAlvoters) {
    $r=sizeof($arrayOfAlvoters)-1;

    
    for ($i = 0; $i <= $r; $i++) {
        $fieldName=$arrayOfAlvoters[$i];
     
        try{
            
            
        if (isset($_POST[$fieldName])) {

            if (empty($_POST[$fieldName])) {

               
              
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
  if(!inputsAreCorrect($arrayOfAlvoters)){
    exit();
  }
  
// prepare and bind
try{



  $sql = "DELETE  FROM authentication  where mobile='$mobile'";
  $result = mysqli_query($conn, $sql);

    
  $code=generateOTP();

  $stmt = $conn->prepare("INSERT INTO `authentication` (mobile, code) VALUES (?, ?)");
  $stmt->bind_param("ss", $mobile, $code);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo $code;
    exit;



 


    
}
catch(Exception $e){
    echo $e;
    
}

function generateOTP() {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
  $otp = '';
  for ($i = 0; $i < 8; $i++) {
    $otp .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $otp;
}




    





  
  