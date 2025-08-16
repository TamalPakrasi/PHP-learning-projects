<!DOCTYPE html>
<html lang="en" data-theme="silk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div id="root" class="min-h-[100dvh] relative flex flex-col">
    <?php include __DIR__ . "/nav.php" ?>
    <main class="flex-grow-1 flex justify-center items-center">
      <?php
      if ($title === "Users") {
        require_once __DIR__ . "/user.php";
      }

      ?>
    </main>
  </div>