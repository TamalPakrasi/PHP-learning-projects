<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';
require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/function.php";

function sendMail(string $to, string $subject, string $body, array $filesArray, string $id)
{
  global $conn;
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tamalpakrasi2003@gmail.com';                     //SMTP username
    $mail->Password   = 'ermb ihzt ohbp wwnk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tamalpakrasi2003@gmail.com', 'TaiToNaki.pvt.lt');
    $mail->addAddress($to, "Customer");     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('tamalpakrasi2003@gmail.com', 'Information');
    $mail->addCC('tamalpakrasi11@gmail.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    foreach ($filesArray as $file) {
      $mail->addAttachment("uploads/$file");         //Add attachments
    }
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;
    
    $sql = "UPDATE `tmail` SET `status` = 'sent' WHERE `id` = '$id'";
    
    $res = mysqli_query($conn, $sql);
      
    if ($res && $mail->send()) {
      $msg = "Mail Sent successfully";
      header("Location: index.php?msg=$msg&send=true");
      die();
    } else {
      dumpDie("Error sending email");
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
