<?php
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$message = "";
if (!empty($_POST["send"])) {
  $user_name = $_POST["userName"];
  $user_email = $_POST["userEmail"];
  $user_phone = $_POST["userPhone"];
  $user_message = $_POST["userMessage"];
  $course = $_POST["courseName"];
  $mail_headers = "Name: " . $user_name .
    "\r\n Email: " . $user_email .
    "\r\n Phone: " . $user_phone .
    "\r\n Message: " . $user_message . "\r\n";
  //Import PHPMailer classes into the global namespace


  //Load Composer's autoloader
  require 'vendor/autoload.php';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  //Server settings
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
  $mail->isSMTP(); //Send using SMTP
  $mail->Host = 'mail.abi.co.ke'; //Set the SMTP server to send through
  $mail->SMTPAuth = true; //Enable SMTP authentication
  $mail->Username = 'web@abi.co.ke'; //SMTP username
  $mail->Password = 'Be1D:TJ1cp9[4r'; //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
  $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('web@abi.co.ke', 'demo.abi.co.ke');
  $mail->addAddress('briansanzii@gmail.com'); //Add a recipient
  $mail->isHTML(true); //Set email format to HTML
  $mail->Subject = "Password for Tujijenge Changa group";
  $mail->Body = $mail_headers;
  $mail->AltBody = $mail_headers;

  if ($mail->send()) {
    return $message = "Your contact information is received successfully. You will be contacted shortly";
  } else {
    return $message = "An error occured please try again later";
  }
}
?>