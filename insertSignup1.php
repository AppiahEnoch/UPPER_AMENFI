<?php
require_once 'config.php';

$v1="email";
$v2="ghanaCard";
$v3="mobile";



// declare all fields
$email= cleanInput( $_POST[$v1]);
$ghanaCard= cleanInput(   $_POST[$v2]);
$mobile= cleanInput( $_POST[$v3]);




// array to test post and set status of vital variables
$arrayOfAllNames=[$v1,$v2,$v3];

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
 $_SESSION["MOBILE"]=$mobile;
 $_SESSION["REG1"]="reg";


try{

  $stmt = $conn->prepare("INSERT INTO sysuser (mobile, email, ghanacard) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $mobile, $email, $ghanaCard);
   $stmt->execute();

$n=1;
   $stmt = $conn->prepare("INSERT INTO verified (mobile, vemail) VALUES (?, ?)");
   $stmt->bind_param("ss", $mobile, $n);
    $stmt->execute();
  
  $stmt->close();
  $conn->close();



 session_start();
 $_SESSION["MOBILE"]=$mobile;
 $_SESSION["REG1"]="reg";


 echo 1;
    
}
catch(Exception $e){
echo $e;
   
    
}



  
  