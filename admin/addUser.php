<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require('../app/app.php');
ensure_user_is_authenticated();
$message ="";
if (is_post()) {
    $id_number = sanitize($_POST['id_number']);
    $name = sanitize($_POST['name']);
    $pnum = sanitize($_POST['phone']);
    $phone = "254$pnum";
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $mail_headers = "Hello : " . $name .
        "\r\n please use The following cred to login to your tujijenge account" .
        "\r\n Email : " . $email ."\r\n".
        "\r\n One time password  is 2430" ."\r\n".
        "\r\n Please login at <a href='http://demo.abi.co.ke'>Tujijenge org</a>". "\r\n";

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    if (empty($name) || empty($id_number) || empty($pnum) || empty($email)) {
        $add_item_error = "please enter valid details";
    } else {
        Data::add_user($id_number, $name, $phone, $email);
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'mail.abi.co.ke';
        $mail->SMTPAuth = true;
        $mail->Username = 'dev@abi.co.ke';
        $mail->Password = '?gn.;z8?n8J&';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom('dev@abi.co.ke', 'abi.co.ke');
        $mail->addAddress('briansanzii@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = "Login details for $name";
        $mail->Body = $mail_headers;
        $mail->AltBody = $mail_headers;
        if ($mail->send()) {
            $message = "$name has recieved the email for their login details";
            redirect('allUsers.php');
          } else {
            return $message = "An error occured please try again later";
          };
    }
}
$view_bag=[
    "message"=> $message
];

view('addUser', $view_bag);