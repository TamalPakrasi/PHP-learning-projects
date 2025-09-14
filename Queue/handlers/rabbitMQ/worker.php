<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

try {
  $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
  $channel = $connection->channel();

  $channel->queue_declare('file_upload_queue', false, true, false, false);

  echo "[*] Waiting for messages. To exit press CTRL+C\n";

  $callback = function ($msg) use ($channel) {
    $data = json_decode($msg->body, true);
    $tempPath = $data['path'];
    $filename = $data['filename'];

    $permanentDir = __DIR__ . '/../../uploads/';
    if (!is_dir($permanentDir)) mkdir($permanentDir, 0777, true);

    if (file_exists($tempPath)) {
      rename($tempPath, $permanentDir . $filename);
      echo "[x] Processed file: $filename\n";
    } else {
      echo "[!] File missing: $filename\n";
    }

    // Correct acknowledgment
    $channel->basic_ack($msg->delivery_info['delivery_tag']);
  };

  $channel->basic_qos(null, 1, null);
  $channel->basic_consume('file_upload_queue', '', false, false, false, false, $callback);

  while (count($channel->callbacks)) {
    try {
      $channel->wait(null, false, 5); // 5 sec timeout
    } catch (\PhpAmqpLib\Exception\AMQPTimeoutException $e) {
      // No messages yet — continue
      continue;
    } catch (\Exception $e) {
      echo "[!] Worker error: " . $e->getMessage() . "\n";
    }
  }

  $channel->close();
  $connection->close();
} catch (\Exception $e) {
  echo "[!] Worker error: " . $e->getMessage() . "\n";
}
