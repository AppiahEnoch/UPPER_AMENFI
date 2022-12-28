<?php  

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

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
$receiverName=$_POST['username'];
$htmlFile=$_POST['htmlFile'];



$host="smtp.gmail.com";
$port="587";


sendEmail();

function sendEmail() {
  
  global $sender,$receiver,$password,$port,
  $host,$subject,$htmlFile,$receiverName,$code;
  $mail = new PHPMailer;
  $html = file_get_contents($htmlFile);


  // modify file
  $html = str_replace('{{name}}', $receiverName, $html);
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
    exit;
     // echo "Error: " . $mail->ErrorInfo;
  } else {
   echo 1;
   exit;
  }
}


?>



