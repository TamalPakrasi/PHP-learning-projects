<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../DB/connections/dbConnect.php";
require_once __DIR__ . "/../utils/checkEmailExists.php";
require_once __DIR__ . "/../utils/abort.php";
require_once __DIR__ . "/message.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST["email-search"]);


  if (!checkEmailExists($conn, $email)) {
    throw new Exception("Invalid Email");
  }

  $_SESSION["search-email"] = $email;
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   =  $_ENV["PROVIDER_EMAIL"];                     //SMTP username
    $mail->Password   = $_ENV["PROVIDER_PASS"];                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_ENV["PROVIDER_EMAIL"], $_ENV["PROVIDER_NAME"],);
    $mail->addAddress($email, 'user');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Changing request';
    $mail->Body    = '<a href="http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/pages/changePass.php" target="_blank">Click here to change password</a>';
    $mail->AltBody = '<a href="http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/pages/changePass.php" target="_blank">Click here to change password</a>';

    $mail->send();
    set_message("Email has been sent. Please check your mail");
    header("Location: http://localhost/PHP-Mini%20Projects/Sessions%20and%20Cookies/session/Google%20OAuth%202.0/pages/signin.php");
    exit;
  } catch (Exception $e) {
    abortSignIn($e->getMessage());
  }
}
