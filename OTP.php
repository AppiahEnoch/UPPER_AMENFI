<?php  


require 'vendor/autoload.php';

$currentHost= gethostname(); 

if($currentHost=="AECleanCodes"){

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  
}



require 'includes/Exception.php';
require 'includes/SMTP.php';
require 'includes/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




$sender=$_ENV["SENDER"];
$password=$_ENV["EMAIL_PASSWORD"];


$subject=$_POST['subject'];
$receiver=$_POST['receiver'];
$code=$_POST['code'];
$htmlFile=$_POST['htmlFile'];



$host="smtp.gmail.com";
$port="587";


sendEmail();

function sendEmail() {
  
  global $sender,$receiver,$password,$port,
  $host,$subject,$htmlFile,$code;
  $mail = new PHPMailer;
  $html = file_get_contents($htmlFile);


  // modify file
  $html = str_replace('{{code}}', $code, $html);



  $mail->isSMTP();
  $mail->Host = $host;
  $mail->SMTPAuth="true";
  $mail->SMTPSecure="tls";
  $mail->Port = $port;



  //echo $port." |".$password." |".$sender." |".$receiver;


  $mail-> Username=$sender;
  $mail->Password = $password;
  $mail->setFrom($sender);
  $mail->addAddress($receiver);
  $mail->Subject = $subject;










  $mail->msgHTML($html);


  
  if (!$mail->send()) {
  
      echo "Error: " . $mail->ErrorInfo;
      exit;
  } else {
   echo 1;
   exit;
  }
}


?>



