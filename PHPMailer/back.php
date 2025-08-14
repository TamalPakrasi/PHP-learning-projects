<?php

declare(strict_types=1);
require_once __DIR__ . "/function.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["files"])) {
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

  $files = (array) $_FILES["files"];

  $filenames = (array) $files["name"];
  $mimetypes = (array) $files["type"];
  $tmpLocs = (array) $files["tmp_name"];
  $sizeInBytes = (array) $files["size"];
  $errs = (array) $files["error"];

  foreach ($errs as $err) {
    if ($err !== 0) {
      dumpDie("Invalid Process");
    }
  }

  foreach ($mimetypes as $type) {
    if (str_contains($type, "javascript")) {
      dumpDie("Invalid file type | File cannot be related to javascript");
    }
  }

  $truncateCount = 0;
  $filesArray = [];
  ensureUploads();

  foreach ($sizeInBytes as $ind => $size) {
    if ($size > 15 * 1024 * 1024) {
      $truncateCount++;
      $errorMsg = "$truncateCount Files trucated";
      continue;
    }

    $tmpLoc = (string) $tmpLocs[$ind];

    $exe = (string) pathinfo($filenames[$ind], PATHINFO_EXTENSION);
    $newfile = uniqid("FILE-", true) . ".$exe";

    if (!uploadFile($newfile, $tmpLoc)) {
      abortProcess($filesArray);
    }

    $filesArray[$ind] = $newfile;
  }

  if (count($filesArray) > 0) {
    $json_array = json_encode($filesArray);
    saveAndSendMail($json_array, $to, $subject, $body);
  }
}
