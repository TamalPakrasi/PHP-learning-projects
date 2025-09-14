<?php

require_once __DIR__ . "/../../utils/debug.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
  $files = $_FILES["file"];

  $filenames = $files["name"];
  $types = $files["type"];
  $tmpnames = $files["tmp_name"];
  $sizes = $files["size"];

  $uploadDir = __DIR__ . "/../../uploads/";

  // Check if folder exists, if not create it
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true); // 0755 = readable/writable, true = create nested dirs
  }

  $uploadsQueue = new SplQueue();
  $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf']; // Allowed MIME types
  $maxSize = 2 * 1024 * 1024; // Max size: 2 MB

  foreach ($tmpnames as $index => $tmpName) {
    // Validate type
    if (!in_array($types[$index], $allowedTypes)) {
      echo "Skipped" .  $filenames[$index] . " — invalid file type.<br>";
      continue;
    }

    // Validate size
    if ($sizes[$index] > $maxSize) {
      echo "Skipped" . $filenames[$index] . " — file too large.<br>";
      continue;
    }

    $uploadsQueue->enqueue([
      'tmp_name' => $tmpName,
      'original_name' => $filenames[$index]
    ]);
  }

  // Process the queue (FIFO)
  while (!$uploadsQueue->isEmpty()) {
    $file = $uploadsQueue->dequeue(); // Take the first file

    $originalName = preg_replace("/[^A-Za-z0-9_\-\.]/", '_', $file['original_name']);

    // Get original extension
    $ext = pathinfo($originalName, PATHINFO_EXTENSION);

    // Rename file: timestamp + unique id
    $newName = time() . '_' . uniqid() . '.' . $ext;

    $targetPath = $uploadDir . "/" . $newName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
      echo "Uploaded: {$file['original_name']}<br>";
    } else {
      echo "Failed: {$file['original_name']}<br>";
    }
  }
}
