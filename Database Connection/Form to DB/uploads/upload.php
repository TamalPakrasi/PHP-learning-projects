<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $file = $_FILES["file"];

  $tmploc = $file["tmp_name"];

  $uploadLoc = __DIR__ . "/../storage/uploads/" . $file["full_path"];

  if (!is_dir(dirname($uploadLoc))) {
    mkdir(dirname($uploadLoc), 0777, true);
  }

  move_uploaded_file($tmploc, $uploadLoc);
}
