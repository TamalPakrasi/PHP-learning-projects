<?php

declare(strict_types=1);
require_once __DIR__ . "/function.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
  $to = (string) trim($_POST["to"]);
  $subject = (string) trim($_POST["subject"]);
  $body = (string) trim($_POST["body"]);

  if (!$to || !$subject || !$body) {
    dumpDie("Invalid data");
  }

  $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/i";
  if (!preg_match_all($emailRegex, $to)) {
    dumpDie("Invalid email format");
  }

  $file = $_FILES["file"];

  $file = (array) $_FILES["file"];

  $filename = (string) $file["name"];
  $tmpLoc = (string) $file["tmp_name"];
  $sizeInBytes = (int) $file["size"];
  $err = (int) $file["error"];

  if ($err === 0) {
    $mimetype = mime_content_type($filename);
    if (str_starts_with($mimetype, "image/")) {
      if ($sizeInBytes <= 1 * 1024 * 1024) {
        ensureUploads();

        $exe = pathinfo($filename, PATHINFO_EXTENSION);
        uploadAndStoreToDB($exe, $tmpLoc, $to, $subject, $body);
      } else {
        dumpDie("Image too large, must be within 1 MB");
      }
    } else {
      dumpDie("File must be an image");
    }
  } else {
    dumpDie("Invalid File Records");
  }
}
