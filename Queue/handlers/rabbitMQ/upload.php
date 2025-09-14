<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {

  $files = $_FILES['file'];
  $messages = [];

  $tempDir = __DIR__ . '/../../uploads_temp/';
  if (!is_dir($tempDir)) mkdir($tempDir, 0777, true);

  $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
  $channel = $connection->channel();
  $channel->queue_declare('file_upload_queue', false, true, false, false);

  $maxRetries = 3;

  foreach ($files['tmp_name'] as $index => $tmpPath) {
    $filename = $files['name'][$index];
    $savedPath = $tempDir . $filename;
    $success = false;

    for ($i = 0; $i < $maxRetries; $i++) {
      if (move_uploaded_file($tmpPath, $savedPath)) {
        $success = true;
        break;
      }
      usleep(500000);
    }

    if ($success) {
      $data = json_encode(['filename' => $filename, 'path' => $savedPath]);
      $msg = new AMQPMessage($data, ['delivery_mode' => 2]);
      $channel->basic_publish($msg, '', 'file_upload_queue');
      $messages[] = "Queued: $filename";
    } else {
      $messages[] = "Failed: $filename";
    }
  }

  $channel->close();
  $connection->close();

  // Save messages in session
  $_SESSION['upload_status'] = $messages;

  // Redirect back to form page
  header('Location: ../../index.php');
  exit;
}
