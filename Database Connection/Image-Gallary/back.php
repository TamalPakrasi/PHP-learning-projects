<?php

require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/dumpDie.php";

function ensureUploadsExist()
{
  $uploads = __DIR__ . "/uploads";
  if (!(is_dir($uploads))) {
    if (!mkdir($uploads, 0777, true)) {
      dumpDie("Something went wrong");
    }
  }
}

function moveToUploads($tmpLoc, $exe): string
{
  $uploads = __DIR__ . "/uploads";
  $newFile = uniqid("IMG-", true) . ".$exe";
  if (!move_uploaded_file($tmpLoc, "{$uploads}/{$newFile}")) {
    dumpDie("Failed to upload file");
  }
  return $newFile;
}

function saveToDB($newFile, $tags)
{
  global $conn;
  $sql = "INSERT INTO `gallery`(`name`, `tags`) VALUES ('$newFile','$tags')";

  $res = mysqli_query($conn, $sql);

  if ($res) {
    $msg = "Image File uploaded successfully";
    header("Location: gallery.php?msg=$msg");
    die();
  } else {
    unlink($newFile);
    dumpDie("Something went wrong");
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
  $tags = trim((string) $_POST["tags"]);
  $file = (array) $_FILES["file"];

  $filename = (string) $file["name"];
  $tmpLoc = (string) $file["tmp_name"];
  $sizeInBytes = (int) $file["size"];
  $err = (int) $file["error"];

  if ($err === 0) {
    $allowedTypes = ["jpg", "png", "jfif", "jpeg"];
    $exe = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if (in_array($exe, $allowedTypes)) {
      if ($sizeInBytes < 1 * 1024 * 1024) {
        ensureUploadsExist();

        $newFile = moveToUploads($tmpLoc, $exe);

        saveToDB($newFile, $tags);
      } else {
        dumpDie("Size is too large than 1 MB");
      }
    } else {
      dumpDie("Invalid file type");
    }
  } else {
    dumpDie("invalid data");
  }
}
