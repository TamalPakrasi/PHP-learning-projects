<?php

require_once __DIR__ . "/getMimeType.php";

function staticServer($file)
{
  if (file_exists($file) && is_file($file)) {
    $mimeType = getMimeType($file);
    header("Content-type: {$mimeType}");
    readfile($file);
    die();
  }
}
