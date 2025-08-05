<?php

function getMimeType(string $file): string {
  $ext = pathinfo($file, PATHINFO_EXTENSION);

  $mimeTypes = [
    "css" => "text/css",
    "html" => "text/html",
    "js" => "application/javascript"
  ];

  return $mimeTypes[$ext] ?? "application/octet-stream";
}
