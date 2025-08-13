<?php

require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/sendEmail.php";

$uploads = __DIR__ . "/uploads";

function dumpDie($val)
{
  echo "<pre>";
  echo var_dump($val);
  echo "</pre>";

  die();
}

function ensureUploads()
{
  global $uploads;
  if (!is_dir($uploads)) {
    mkdir($uploads, 0777, true);
  }
}

function upload(string $newfile, string $tmpLoc): bool
{
  global $uploads;
  if (move_uploaded_file($tmpLoc, "$uploads/$newfile")) {
    return true;
  } else {
    return false;
  }
}

function saveToDB(string $newfile, string $to, string $subject, string $body) {
  global $conn;
  global $uploads;
  $bytes = random_bytes(16);
  $id = bin2hex($bytes); //32 chars

  $sql = "INSERT INTO `tmail`(`id`, `toEmail`, `subject`, `body`, `attachment`) VALUES ('$id','$to','$subject','$body','$newfile')";

  $res = mysqli_query($conn, $sql);

  if ($res) {
    if (sendMail($to, $subject, $body, $newfile, $id)) {
      header("Location: index.php?msg=success");
      die();
    } else {
      dumpDie("Error sending email");
    }
  } else {
    unlink("$uploads/$newfile");
    dumpDie("Something went wrong");
  }
}

function uploadAndStoreToDB(string $exe, string $tmpLoc, string $to, string $subject, string $body)
{
  $newfile = uniqid("IMG-", true) . ".$exe";
  if (upload($newfile, $tmpLoc)) {
    saveToDB($newfile, $to, $subject, $body);
  }
}
