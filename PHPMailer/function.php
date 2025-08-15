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

function uploadFile(string $newfile, string $tmpLoc): bool
{
  global $uploads;
  if (move_uploaded_file($tmpLoc, "$uploads/$newfile")) {
    return true;
  } else {
    return false;
  }
}

function saveAndSendMail(string $json_array, string $to, string $subject, string $body, bool $send)
{
  global $conn;
  global $uploads;
  $bytes = random_bytes(16);
  $id = bin2hex($bytes); //32 chars

  $sql = "INSERT INTO `tmail`(`id`, `toEmail`, `subject`, `body`, `attachment`) VALUES ('$id','$to','$subject','$body','$json_array')";

  $res = mysqli_query($conn, $sql);

  if ($res) {
    if ($send) {
      $filesArray = json_decode($json_array);
      sendMail($to, $subject, $body, $filesArray, $id);
    } else {
      $msg = "File saved as drafts";
      header("Location: index.php?msg=$msg&send=false");
      die();
    }
  } else {
    unlink("$uploads/$json_array");
    dumpDie("Something went wrong");
  }
}

function abortProcess(array $filesArray)
{
  global $uploads;
  if (count($filesArray) > 0) {
    foreach ($filesArray as $file) {
      unlink("$uploads/$file");
    }
  }
  dumpDie("Something went wrong | File uploading failed");
}

function renderMails($res)
{
  $hasData = false;
  while ($data = mysqli_fetch_assoc($res)) {
    $hasData = true;
    include __DIR__ . "/partials/list.php";
  }

  if (!$hasData) {
    echo "<li class='list-group-item text-center fs-3 fw-bold'>No Mails</li>";
  }
}
