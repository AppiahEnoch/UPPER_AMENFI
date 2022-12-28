<?php
require_once 'config.php';

$v1="mobile";
$v2="username";
$v3="password";
$v4="email";

// declare all fields
$mobile= cleanInput( $_POST[$v1]);
$username= cleanInput(   $_POST[$v2]);
$password= cleanInput( $_POST[$v3]);
$email= cleanInput( $_POST[$v4]);



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


  

//$sql = "DELETE  FROM sysadmin  where mobile='$mobile'";
$sql = "DELETE  FROM sysadmin";
$result = mysqli_query($conn, $sql);
// prepare and bind
try{

$stmt = $conn->prepare("INSERT INTO sysadmin (mobile, username, `password`,email) VALUES (?, ?, ?,?)");
$stmt->bind_param("ssss", $mobile, $username, $password,$email);
 $stmt->execute();

 echo 1;
$stmt->close();
$conn->close();
    
}
catch(Exception $e){


  

   
    
}



  
  