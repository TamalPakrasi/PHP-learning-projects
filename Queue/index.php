<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #f9f9f9;
    }

    .upload-container {
      background: #fff;
      padding: 20px;
      border-radius: 4px;
      text-align: center;
      width: 280px;
      border: 1px solid #ddd;
    }

    .upload-container h2 {
      font-size: 18px;
      margin-bottom: 15px;
      color: #333;
    }

    input[type="file"] {
      width: 100%;
      margin-bottom: 15px;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    button:hover {
      background: #0056b3;
    }
  </style>
</head>

<body>

  <div class="upload-container">
    <?php
    session_start();
    if (isset($_SESSION['upload_status'])) {
      echo '<div style="margin-top:10px; text-align:left;">';
      foreach ($_SESSION['upload_status'] as $msg) {
        $color = strpos($msg, 'Queued') !== false ? 'green' : 'red';
        echo "<div style='color:$color;'>$msg</div>";
      }
      echo '</div>';
      unset($_SESSION['upload_status']); // clear messages
    }
    ?>
    <h2>Upload File</h2>
    <form action="./handlers/rabbitMQ/upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file[]" multiple>
      <button type="submit">Upload</button>
    </form>
  </div>

</body>

</html>